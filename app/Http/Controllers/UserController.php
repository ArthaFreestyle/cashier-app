<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        return view('editmember', [
            'users' => User::where('status_user','=','1')->get()
        ]);
    }

    public function dashboard(){
        $todayMonth = Carbon::now()->format('m');
        $income = DB::table('penjualan')->sum('Total_Harga');
        $monthly = DB::table('penjualan')->whereMonth('created_at',$todayMonth)->sum('Total_Harga');
        return view('index',[
            'income' => $income,
            'monthly'=> $monthly
        ]);
    }

    public function delete(Request $request){
        $user = User::find($request->id);

        $user->status_user = 0;
        $user->save();

        activity()->causedBy(Auth::user())->performedOn($user)->event('delete')->log('The user has delete.');

        return redirect('updatemember');
    }

    public function update($id){
        
        $user = User::find($id);
        activity()->causedBy(Auth::user())->performedOn($user)->event('open update menu')->log('The user open update menu.');
        return view('updatemember',[
            'user' => $user,
            'roles' => role::all()
        ]);
    }

 

    public function updates(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','string','max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
            'wa' => ['required','string'],
        ]);

        $user = User::find($request->id);

        $user->Nama_User = $request->name;
        $user->Username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->wa = $request->wa;
        $user->role_id = $request->role;


        $user->update();

        activity()->causedBy(Auth::user())->performedOn($user)->event('edit')->log('The user has Edit.');

        return redirect('updatemember');

    }

    public function access(){
        activity()->causedBy(Auth::user())->performedOn(Auth::user())->event('open access menu')->log('The user has open access menu.');
        $Roles = role::all();
        $permissions = Permission::all();
        return view('Access',compact('Roles','permissions'));
    }

}
