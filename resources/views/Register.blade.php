@extends('layouts.main')
@section('container')

    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Register User</h5>
          <div class="card">
            <div class="card-body">
              <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="Select" class="form-label">Role</label>
                  <select id="Select" class="form-select" name="role">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label">Nama User</label>
                    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail3" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="wa">
                </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>

                
                <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="created" value="{{ Auth::user()->Username }}" hidden>

                <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="updated" value="{{ Auth::user()->Username }}" hidden>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
              </form>
            </div>
          </div>  
        </div>

@endsection