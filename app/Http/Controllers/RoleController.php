<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\RoleHasPermission;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class RoleController extends Controller {
    public function index(){
        $roles = DB::table('roles')->get();
        return view('Role.index',compact('roles'));
    }

    public function delete($id){
        $roles = DB::table('roles')->where('id',$id)->delete();
        return redirect('role');
    }

    public function update(Request $request){
        $roles = DB::table('roles')->where('id',$request->role_id)->update(['name' => $request->role_names]);
        return redirect('role');
    }

    public function register(Request $request){
        $request->validate([
            'role_name' => 'required'
        ]);

        role::create([
            'name' => $request->role_name
        ]);

        return redirect('role');
    }
    public function selectSessions(Request $request)
{
    activity()->causedBy(Auth::user())->performedOn(Auth::user())->event('change access')->log('The user has change access.');
    $role = $request->post('role');
    $items = $request->post('items');
    

    $role = role::findOrFail($role);
    $permissions = $role->permissions;

    RoleHasPermission::where('role_id',$role->id)->delete();

    foreach ($items as $item) {
        $role->givePermissionTo($item);
    }

    return response()->json(['success' => true]);
    }
    }
