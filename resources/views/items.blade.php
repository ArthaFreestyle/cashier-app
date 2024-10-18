@extends('layouts.main')
@section('container')
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Input Barang</h5>
              <div class="card">
                <div class="card-body">
                  <form action="registeritem" method="POST">
                    @csrf
                    <div class="row align-item-center">
                    <div class="mb-3 col">
                      <label for="kode_barang" class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="kode_barang" name="id_barang" placeholder="ex. 8998866203012">
                    </div>
                    <div class="mb-3 col">
                      <label for="harga_barang" class="form-label">Harga Barang</label>
                      <input type="integer" class="form-control" id="harga_barang" name="harga_barang" placeholder="ex. 21000">
                    </div>
                  </div>
                    
                    <div class="mb-3">
                      <label for="nama_barang" class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="ex. SEDAAP KECAP MNS SPECIAL BTL 275 ML">
                    </div>

                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock Barang</label>
                      <input type="text" class="form-control" id="stok" name="stok" placeholder="ex. 115">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
@endsection

