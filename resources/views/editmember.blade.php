@extends('layouts.main')
@section('container')

<div class="container-fluid">
<div class="col-lg d-flex align-items-stretch">
    <div class="card w-100 mt-3">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Member List</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Username</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Tanggal Bergabung</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Email</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Whatsapp</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Role</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Action</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $user->Username }}</h6>
                    <span class="fw-normal">{{ $user->Nama_User }}</span>                          
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $user->created_at }}</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary rounded-3 fw-semibold">{{ $user->email }}</span>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-normal mb-0 fs-4">{{ $user->wa }}</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">{{ $user->hasRole->name }}</h6>
                </td>
                <td>
                  <span>
                    <a href="updatemember/update/{{ $user->id }}" class="btn btn-warning m-1">edit</a>
                </span>
                <span>
                  <form action="updatemember/delete" method="POST">
                    @csrf
                    <input type="number" value="{{ $user->id }}" name="id" hidden>
                    <button type="submit" class="btn btn-danger m-1">delete</button>
                  </form>
                </span>
                </td>
              </tr> 
              @endforeach                       
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection