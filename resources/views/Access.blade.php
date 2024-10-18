@extends('layouts.main')
@section('container')
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Role Permission</h5>
              <div class="card">
                <div class="card-body">
                    <div class="row align-item-center mb-4">
                            <select class="form-select" aria-label="Default select example" name="role" id="roles">
                                <option selected>select role</option>
                                @foreach ($Roles as $Role)
                                <option value="{{ $Role->id }}">{{ $Role->name }}</option>
                                @endforeach
                            </select>
                    </div>

                    @foreach ($permissions as $permission)
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" id="flexCheckIndeterminate" name="select[]">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                        {{ $permission->name }}
                      </label>
                    </div>
                    @endforeach

                    <button type="button" class="btn btn-danger mt-4" onclick="deleteSelected()">Save</button>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('js')
<script>
      function deleteSelected() {
          var checkboxes = document.getElementsByName('select[]');
          var Role = document.querySelector('#roles');
          var selectedItems = [];
  
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].checked) {
                  selectedItems.push(checkboxes[i].value);
              }
          }
          var csrfToken = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
                  type: "POST",
                  url: "/select-sessions",
                  data: {
                    _token: csrfToken,
                    items: selectedItems,
                    role: Role.value
                  },
                  success: function(response) {
                      console.log(response);
                      window.location.reload();
                  },
                  error: function(xhr, status, error) {
                      console.error(xhr.responseText);
                  }
              });
        }

        $('#roles').on('change',function(){
          var checkboxes = document.getElementsByName('select[]');
          for (var i = 0; i < checkboxes.length; i++) {
              checkboxes[i].checked = false;
          }
          $.ajax({
                  type: "POST",
                  url: "http://127.0.0.1:8000/api/rolePermission",
                  data: {
                    id : $('#roles').val(),
                  },
                  success: function(response) {
                    response.forEach(function(item){
                      for (var i = 0; i < checkboxes.length; i++) {
                        //console.log(item.name)
                         if (checkboxes[i].value == item.name) {
                            checkboxes[i].checked = true;
                          }
                        }
                    });
                      
                  },
                  error: function(xhr, status, error) {
                      console.error(xhr.responseText);
                  }
              });
          // for (var i = 0; i < checkboxes.length; i++) {
          //     if (checkboxes[i].checked) {
          //         selectedItems.push(checkboxes[i].value);
          //     }
          // }
        })
  </script>

 
@endsection
  

