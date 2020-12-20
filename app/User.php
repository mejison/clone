<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 
    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_users', 'users_id', 'project_id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'users_id', 'id');
    }

    public function role()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }
}
