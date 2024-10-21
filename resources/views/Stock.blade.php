@extends('layouts.main')
@section('container')

<div class="container-fluid">
<div class="col-lg d-flex align-items-stretch">
    <div class="card w-100 mt-3">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Items List</h5>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="searchInput" placeholder="Search Items" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="button"  onclick="searchItems()" id="button-addon2">Search</button>
        </div>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle" id="itemsTable">
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

<script>
  function searchItems() {
      let input = document.getElementById('searchInput').value.toLowerCase(); // Ambil nilai dari input pencarian
      let table = document.getElementById('itemsTable'); // Ambil tabel
      let rows = table.getElementsByTagName('tr'); // Ambil semua baris dari tabel

      // Loop melalui semua baris tabel, kecuali header
      for (let i = 1; i < rows.length; i++) {
          let cells = rows[i].getElementsByTagName('td'); // Ambil semua sel dalam baris

          // Cek jika ada sel yang sesuai dengan input pencarian
          let found = false;
          for (let j = 0; j < cells.length; j++) {
              if (cells[j].textContent.toLowerCase().indexOf(input) > -1) {
                  found = true;
                  break;
              }
          }

          // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
          rows[i].style.display = found ? '' : 'none';
      }
  }
</script>

@endsection