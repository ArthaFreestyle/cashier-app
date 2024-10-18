@extends('layouts.main')
@section('container')

<div class="container-fluid">
<div class="col-lg d-flex align-items-stretch">
    <div class="card w-100 mt-3">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Invoice</h5>
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
                  <h6 class="fw-semibold mb-0">id penjualan</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Cash</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Action</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($invoices as $invoice)
              <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $user->find($invoice->id_karyawan)->Nama_User }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    <span class="badge bg-primary rounded-3 fw-semibold">#{{ $invoice->id_penjualan }}</span>
                </td>
                <td class="border-bottom-0">
                    <p class="mb-0 fw-normal ">+ {{ $invoice->Total_Harga }}</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <a href="invoice/{{ $invoice->id_penjualan }}" class="btn btn-primary"><i class="bi bi-eye me-2"></i>View</a>
                    <a href="invoice/{{ $invoice->id_penjualan }}/generate" class="btn btn-warning"><i class="bi bi-printer me-2"></i></i>Download</a>
                  </div>
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