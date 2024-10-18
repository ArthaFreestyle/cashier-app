<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;

    protected $table = 'permissions_role';

    protected $fillable = ['role_id', 'permission_id'];

    public static function FindByName($name){
        return static::where('name',$name)->first();
    }

    
}
