<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    
    /**
     * Regras da tabela
     * 
     *  @var array
     */
    public $rules =  [
            'name' => 'required | min:4 | max:100',
            'email' => 'required | email| max:100 | unique:users',
            'password' => 'required | min:6 | max:100'
        ];
    /**
     * Posts do User
     * 
     * @var array 
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function likes(){
        return $this->hasMany('App\Like');
    }
}
