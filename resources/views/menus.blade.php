@extends('layouts.main')
@section('container')
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Input Menu</h5>
              <div class="card">
                <div class="card-body">
                  <form action="registeritem" method="POST">
                    @csrf
                    <div class="row align-item-center">
                      <select class="form-select" aria-label="Default select example" name="mainMenu">
                          <option selected>Open this select main menu</option>
                          @foreach ($Menus as $Menu)
                          <option value="{{ $Menu->name }}">One</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="row align-item-center">
                    <div class="mb-3 col">
                      <label for="kode_barang" class="form-label">Nama Menu</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3 col">
                      <label for="harga_barang" class="form-label">URL</label>
                      <input type="integer" class="form-control" id="url" name="url">
                    </div>
                  </div>
                    
                    <div class="mb-3">
                      <label for="nama_barang" class="form-label">icon</label>
                      <input type="text" class="form-control" id="icon" name="icon">
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

