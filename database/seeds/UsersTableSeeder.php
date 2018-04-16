<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Seed test admin
        $seededAdminEmail = 'admin@admin.com';
        $seededAdminUsername = 'admin';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create(array(
                'name' => $seededAdminUsername,
                'email' => $seededAdminEmail,
                'password' => Hash::make('password'),
                'is_admin' => 1
            ));

            $user->save();

        }

    }
}
