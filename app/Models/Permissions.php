<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    protected $table = 'Permissions';

    protected $fillable = [
        'name'
    ];
    public static function FindByName($name){
        return static::where('name',$name)->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permissions_role', 'permission_id', 'role_id');
    }
}
