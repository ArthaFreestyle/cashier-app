@extends('layouts.main')
@section('container')
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Input Role</h5>
              <div class="card">
                <div class="card-body">
                  <form action="registerrole" method="POST">
                    @csrf
                    <div class="row align-item-center">
                    <div class="col">
                      <label for="role_name" class="form-label">Nama Role</label>
                      
                      <input type="text" class="form-control" id="role_name" name="role_name"  >
                    </div>
                  </div>
                  <br>

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
                          <h6 class="fw-semibold mb-0">Username</h6>
                        </th>
                        <th class="border-bottom-0" >
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                      <tbody>
                        
                          @foreach ($roles as $role)
                          <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">{{ $role->name }}</h6>                          
                          </td>
                          <td>
                            <a class="btn btn-warning edit" data-bs-target="#exampleModalToggle" data-id={{ $role->id }} data-bs-toggle="modal">Edit</a>
                            <a class="btn btn-danger" href="role/delete/{{ $role->id }}" role="button">Delete</a>
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
                                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit Role</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="updaterole" method="POST">
                                    @csrf
                                    <div class="row align-item-center">
                                      <input type="number" id="role_id" name="role_id" hidden>
                                    <div class="col">
                                      <label for="role_names" class="form-label">Nama Role</label>
                                      <input type="text" class="form-control" id="role_names" name="role_names"  >
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
                var roleId = this.getAttribute('data-id');
                $.ajax({
                  type: "POST",
                  url: "http://127.0.0.1:8000/api/roleName",
                  data : {
                    id : roleId,
                  },
                  success: function(response) {
                    $('#role_names').val(response.name);  
                    $('#role_id').val(response.id);
                  },
                  error: function(xhr, status, error) {
                      console.error(xhr.responseText);
                  }
              });
              });
          </script>
@endsection

