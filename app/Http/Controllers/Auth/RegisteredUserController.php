<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('register',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','string','max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'wa' => ['required','string'],
        ]);



        $user = User::create([
            'Nama_User' => $request->name,
            'Username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'wa' => $request->wa,
            'CREATED_BY' => $request->created,
            'UPDATE_BY' => $request->created,
            'role_id' => $request->role
        ]);

        $user->assignRole($request->role);


        return redirect('register');
    }
}
