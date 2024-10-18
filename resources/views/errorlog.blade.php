@extends('layouts.main')
@section('container')

<div class="container-fluid">
<div class="col-lg d-flex align-items-stretch">
    <div class="card w-100 mt-3">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Error Log</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">id user</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Controller</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Function</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Error Line</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Error Message</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($errorlogs as $log)
              <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $log->ID_USER }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    <span class="badge bg-primary rounded-3 fw-semibold">{{ $log->Controller }}</span>
                </td>
                <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $log->function }}</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <h6 class="fw-normal mb-0 fs-4">{{ $log->Error_Line }}</h6>
                  </div>
                </td>
                
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">{{ $log->Error_Message }}</h6>
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