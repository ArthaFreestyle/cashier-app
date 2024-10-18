@extends('layouts.main')
@section('container')

<div class="container-fluid">
<div class="col-lg d-flex align-items-stretch">
    <div class="card w-100 mt-3">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Items List</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nama Barang</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Harga Barang</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Jumlah Barang</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Action</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($barangs as $barang)
              <tr @if ($barang->jumlah_barang <= 0)
                class="bg-danger-subtle"
                @elseif ($barang->jumlah_barang <=7)
                class="bg-warning-subtle"
              @endif>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $barang->id_barang }}</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $barang->nama_barang }}</h6>                         
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">{{ $barang->harga_barang }}</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary rounded-3 fw-semibold">{{ $barang->jumlah_barang }}</span>
                  </div>
                </td>
                <td>
                  <span>
                    <a href="stock/update/{{ $barang->id_barang }}" class="btn btn-warning m-1">edit</a>
                </span>
                <span>
                  <form action="updatemember/delete" method="POST">
                    @csrf
                    <input type="number" value="{{ $barang->id_barang }}" name="id" hidden>
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