<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'surname', 'south_african_id_number', 'mobile_number', 'birth_date', 'language_id', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function($model)
        {

            $model->birth_date = Carbon::createFromFormat('m/d/Y', $model->birth_date);

            return $model;

        });
    }

    public function interests()
    {
        return $this->belongsToMany('App\Interest', 'user_interests', 'user_id', 'interest_id')
            ->whereNull('user_interests.deleted_at');
    }

    public function language() {
        return $this->belongsTo('App\Language');

    }

    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

}
