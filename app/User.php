<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * Na busca dos dados ele tira os atibutos passados no hidden
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     * Converte a coluna de uma tabela para um tipo de dado especifico
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'name' => 'boolean',
    ];
}
