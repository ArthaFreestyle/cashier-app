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
                  <form action="registermenu" method="POST">
                    @csrf
                    <div class="row align-item-center">
                    <div class="mb-3 col">
                      <label for="menu_name" class="form-label">Nama Menu</label>
                      <input type="text" class="form-control" id="menu_name" name="menu_name">
                    </div>
                    <div class="mb-3 col">
                      <label for="url" class="form-label">url</label>
                      <input type="integer" class="form-control" id="url" name="url" >
                    </div>
                  </div>
                    <div class="mb-3">
                      <label for="icon" class="form-label">icon</label>
                      <input type="text" class="form-control" id="icon" name="icon">
                    </div>

                    <div class="row align-item-center mb-4">
                      <select class="form-select" aria-label="Default select example" name="main_menu" id="main_menu">
                          <option selected>select main menu</option>
                          @foreach ($mainmenus as $menu)
                          <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                          @endforeach
                          <option value=null >Make it Main Menu</option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="card-body">
                  <table class="table text-nowrap mb-0">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0" style="width: 100px">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0" >
                          <h6 class="fw-semibold mb-0"><b>Nama Menu</b></h6>
                        </th>
                        <th class="border-bottom-0" >
                          <h6 class="fw-semibold mb-0"><b>url</b></h6>
                        </th>
                        <th class="border-bottom-0" >
                          <h6 class="fw-semibold mb-0"><b>icon</b></h6>
                        </th>
                        <th class="border-bottom-0" >
                          <h6 class="fw-semibold mb-0"><b>parent</b></h6>
                        </th>
                        <th class="border-bottom-0" >
                          <h6 class="fw-semibold mb-0"><b>Action</b></h6>
                        </th>
                      </tr>
                      <tbody>
                        @foreach ($mainmenus as $menu)
                          <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">{{ $menu->name }}</h6>                          
                          </td>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">/{{ $menu->url }}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                          <i class="{{ $menu->icon }}"></i>                         
                        </td>
                        <td class="border-bottom-0">
                          Parent                         
                        </td>
                          <td>
                            <a class="btn btn-warning edit" data-bs-target="#exampleModalToggle" data-id={{ $menu->id }} data-bs-toggle="modal">Edit</a>
                            <a class="btn btn-danger" href="menu/delete/{{ $menu->id }}" role="button">Delete</a>
                          </td>
                        </tr>
                          @endforeach
                        
                          @foreach ($menus as $menu)
                          <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">{{ $menu->name }}</h6>                          
                          </td>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">/{{ $menu->url }}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                          <i class="{{ $menu->icon }}"></i>                         
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">{{ $menu->mainMenus->name }}</h6>                       
                        </td>
                          <td>
                            <a class="btn btn-warning edit" data-bs-target="#exampleModalToggle" data-id={{ $menu->id }} data-bs-toggle="modal">Edit</a>
                            <a class="btn btn-danger" href="menu/delete/{{ $menu->id }}" role="button">Delete</a>
                          </td>
                        </tr>
                          @endforeach
                          
                        </tbody>
                      </thead>
                    </table>

                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="updatemenu" method="POST">
                              @csrf
                              <div class="row align-item-center">
                                <input type="number" id="menu_id" name="menu_id" hidden>
                              <div class="col">
                                <label for="menu_names" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control" id="menu_names" name="menu_names"  >
                              </div>
                              <div class="col">
                                <label for="menu_url" class="form-label">url</label>
                                <input type="text" class="form-control" id="menu_url" name="menu_url"  >
                              </div>
                              <div class="mb-3">
                      <label for="menu_icon" class="form-label">icon</label>
                      <input type="text" class="form-control" id="menu_icon" name="menu_icon">
                    </div>

                    <div class="row align-item-center mb-4">
                      <select class="form-select" aria-label="Default select example" name="main_menu" id="mainmenu">
                          <option selected>select main menu</option>
                          @foreach ($mainmenus as $menu)
                          <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                          @endforeach
                          <option value=null >Make it Main Menu</option>
                      </select>
                    </div>
                            </div>
                            <p style="color: red">*Anda akan mengganti nama role.</p>
                            
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" type="submit">Validate</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>

          <script>
            $('.edit').on('click',function(){
              var menuId = this.getAttribute('data-id');
              $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/api/menuName",
                data : {
                  id : menuId,
                },
                success: function(response) {
                  $('#menu_names').val(response.name);  
                  $('#menu_id').val(response.id);
                  $('#menu_url').val(response.url);
                  $('#menu_icon').val(response.icon);
                  $('#mainmenu').val(response.main_menu);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            });
        </script>
@endsection

