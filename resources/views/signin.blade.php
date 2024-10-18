@extends('layouts.login')
@section('container')
<div class="background-image">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-5">
          <div class="container align-items-center mb-4">
            <img src="https://hebat.elearning.unair.ac.id/pluginfile.php/1/core_admin/logo/0x200/1711389543/kampus%20merdeka.png" alt="" class="mb-4">
            <p class="text-center">Welcome to</p>
            <h2 class="card-title text-center"><b>Universitas Airlangga</b></h2>
            <p class="text-center opacity-75">please login using registered username <br> and password</p>
          </div>
            <form action="login" method="POST">
              @csrf
                <div class="form-floating mb-3">
                  <input type="email" class="form-control @error('email')
                    is-invalid
                  @enderror" id="floatingInput" placeholder="name@example.com" name="email" required>
                  <label for="floatingInput">Email address</label>
                  @error('email')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
              
               
                <div class="form-floating mb-4">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                  <label for="floatingPassword">Password</label>
                </div>

                       <!-- Remember Me -->
          <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 mb-3" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
              </label>
          </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
              
      </div>
            </form>
        </div>
    </div>
</div>
@endsection