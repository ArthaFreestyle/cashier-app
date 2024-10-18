<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Models\role;

class ApiController extends Controller
{
    public function getPermissions(Request $request){
        $role = role::findOrFail($request->post('id'));
        $permissions = $role->permissions;
        $data = [];
        foreach($permissions as $permission){
            $data[] = ['name' => $permission->name];
        }
        return response()->json($data);
    }
    public function getName(Request $request){
        $role = role::findOrFail($request->post('id'));
        return response()->json($role);
    }

    public function getMenu(Request $request){
        $menu = Navigation::findOrFail($request->post('id'));
        return response()->json($menu);
    }
}
