<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     *
     */
    protected $table = 'users';


    protected $fillable = [
        'Nama_User',
        'Username',
        'email',
        'password',
        'wa',
        'role_id',
        'CREATED_BY',
        'UPDATE_BY',
    ];

    public function hasRole(){
        return $this->belongsTo(role::class,'role_id','id');
    }

    
}