<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Language;
use App\Interest;
use Validator;
use Auth;
use Event;
use App\Events\SendMail;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_admin', false)->get();
        return View('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $languages = Language::pluck('name', 'id');
        $interests = Interest::pluck('name', 'id');

        $data = [
            'languages' => $languages,
            'interests' => $interests
        ];

        return View('users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::make($request->all(),
            [
                'email' => 'required|email|max:255|unique:users',
                //'password' => 'required|min:6|max:20|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[^a-zA-Z0-9]).*$/';
                //'password_confirmation' => 'required|same:password',
                'birth_date' => 'date'
            ],
            [
                'email.required' => trans('auth.emailRequired'),
                'email.email' => trans('auth.emailInvalid'),
                //'password.required' => trans('auth.passwordRequired'),
                //'password.min' => trans('auth.passwordMin'),
                //'password.max' => trans('auth.passwordMax'),
                //'password.regex' => trans('auth.passwordRegex')
            ]
        )->validate();


        $user =  User::create([
            'name' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'surname' => $request->input('surname'),
            'language_id' => $request->input('language_id'),
            'south_african_id_number' => $request->input('south_african_id_number'),
            'mobile_number' => $request->input('mobile_number'),
            'birth_date' => $request->input('birth_date'),
            'email' => $request->input('email'),
            'password' => bcrypt('password'),//bcrypt($request->input('password')),
            'remember_token' => str_random(64)
        ]);

        if($request->has('interests')) {
            foreach($request->input('interests') as $interestId) {
                $user->interests()->attach($interestId);
            }
        }

        Event::fire(new SendMail($user->id));

        return redirect('/')->with('success', trans('users.createSuccess'));

    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $user = User::find($id);
        $languages = Language::pluck('name', 'id');
        $interests = Interest::pluck('name', 'id');

        $data = [
            'user' => $user,
            'languages' => $languages,
            'interests' => $interests,
        ];

        return View('users.edit')->with($data);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);

        $fields = [
            'password' => 'nullable|confirmed|min:6'
        ];
        $messages = [];
        if ($emailCheck) {
            $fields['email'] = 'email|max:255|unique:users';
        }
        /*if($request->input('password') != '') {
            $fields['password'] = 'present|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[^a-zA-Z0-9]).*$/';
            $messages = [
                'password.regex' => trans('passwordRegex')
            ];
        }*/

        Validator::make($request->all(), $fields, $messages)->validate();

        $user->first_name = $request->input('first_name');
        $user->surname = $request->input('surname');
        $user->language_id = $request->input('language_id');
        $user->south_african_id_number = $request->input('south_african_id_number');
        $user->mobile_number = $request->input('mobile_number');
        $user->birth_date = $request->input('birth_date');

        if ($emailCheck) {
            $user->email = $request->input('email');
        }

        /*if ($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }*/

        $user->save();

        $user->interests()->detach();
        if($request->has('interests')) {
            foreach($request->input('interests') as $interestId) {
                $user->interests()->attach($interestId);
            }
        }

        return redirect('/')->with('success', trans('users.updateSuccess'));
    }

    /**
     * Remove the specified user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $currentUser = Auth::user();
        $user = User::findOrFail($id);

        if ($user->id != $currentUser->id) {

            $user->interests()->detach();
            $user->delete();
            return redirect('/')->with('success', trans('users.deleteSuccess'));
        }
        return redirect('/')->with('error', trans('users.deleteSelfError'));

    }
}
