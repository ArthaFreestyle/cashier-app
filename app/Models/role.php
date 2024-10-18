<?php

namespace App\Models;

use App\Models\Permissions;
use App\Models\RoleHasPermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public function givePermissionTo($name){
        $permission = Permissions::FindByName($name);
        RoleHasPermission::create([
            'permission_id' => $permission->id,
            'role_id' => $this->id
        ]);
    }

    public function permissions(){
        return $this->belongsToMany(Permissions::class,'permissions_role', 'role_id', 'permission_id');
    }

    public function Permitted($name){
        foreach($this->permissions as $permission){
            if($permission->name == $name){
                return true;
            }
        }
        return false;
    }

    public function TakeAllPermission(){
        return $this->hasMany(RoleHasPermission::class,'role_id','id');
    }

    

}
