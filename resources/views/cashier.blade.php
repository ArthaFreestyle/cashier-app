@extends('layouts.main')

@section('container')

@if (session()->has('success'))
     <script>
    Swal.fire({
    title: 'Success...',
    text: "{{ session('success') }}",
    icon: 'success',
    confirmButtonText: 'Cool'
    })
     </script>
@endif

@if (session()->has('error'))
     <script>
    Swal.fire({
    title: 'Not Enough Stock',
    text: "{{ session('error') }}",
    icon: 'error',
    confirmButtonText: 'Ok'
    })
     </script>
@endif

<div class="container-fluid">
<div class="row">
    <div class="col-lg-7 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Shopping Cart</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Id</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Nama Item</h6>
                    </th>
                    <th class="border-bottom-0" style="width: 200px">
                      <h6 class="fw-semibold mb-0">Jumlah</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Harga/Pcs</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Harga</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (session()->has('cart'))
                  @foreach (session('cart') as $carty )
                    @if(isset($carty['id_barang']))
                  <tr class="box" style="border:1px solid black">
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-semibold">{{ $carty['nama_barang'] }}</p>
                    </td>
                    <td class="border-bottom-0" >
                      <div class="d-flex align-items-center gap-3">
                        <form action="changevalue" method="POST" id="change">
                          @csrf
                          <input type="text" name="id_barang" value="{{ $carty['id_barang'] }}" hidden>
                          <input type="number" class="form-control" id='quant' name="kuantitas" value={{ $carty['kuantitas'] }} style="border: 0ch;width:100px">
                        </form>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ number_format($carty['harga_barang'],0,',','.') }}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ number_format($carty['harga_barang'] * $carty['kuantitas'],0,',','.') }}</h6>
                    </td>
                  </tr>
                    @endif
                  @endforeach
                  <tr>
                    <td class="border-bottom-0">
                    </td>
                    
                    <td class="border-bottom-0">
                    </td>
                    <td class="border-bottom-0">
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">Total</h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ number_format(session('cart')['harga_total'],0,',','.' )}}</h6>
                    </td>
                  </tr> 
                  
                  @endif   
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <div class="col-lg-5 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <form action="cart" method="POST">
            @csrf
            <div class="input-group mb-3 col">
                <input type="text" class="form-control" id="search" name="id_barang" placeholder="Kode Item" aria-describedby="button-addon1" autocomplete="off" autofocus>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Submit</button>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="kodebarang" name="search" placeholder="Cari Barang...." aria-describedby="button-addon1" autocomplete="off">
            </div>
          </form>
            <div id="barangList">
            </div>
            <div style="height: 500px">
              <div class="d-flex justify-content-center" style="height: 100px">
                <button class="besar" value="1">1</button>
                <button class="besar" value="2">2</button>
                <button class="besar" value="3">3</button>
                <button class="action" value="qty">Qty</button>
              </div> 
            
              <div class="d-flex justify-content-center" style="height: 100px">
                <button class="besar" value="4">4</button>
                <button class="besar" value="5">5</button>
                <button class="besar" value="6">6</button>
                <button class="action" value="disc">Disc%</button>
              </div> 
              <div class="d-flex justify-content-center" style="height: 100px">
                <button class="besar" value="7">7</button>
                <button class="besar" value="8">8</button>
                <button class="besar" value="9">9</button>
                <button class="back" value="del">delete</button>
              </div> 
              <div class="d-flex justify-content-center" style="height: 100px">
                <button class="besar" value="0">0</button>
                <button class="besar" value="00">00</button>
                <button class="besar" value=".">.</button>
                <button class="back" value="backspace"><i class="bi bi-backspace"></i></button>
              </div> 
              <a href="Payments"><button class="sangat-besar"><b>Payments </b><i class="bi bi-chevron-compact-right"></i></button></a>
              
              
              
            </div>
          
        </div>
      </div>
    </div>
</div>
</div>

<!-- Footer -->
@if (session()->has('cart'))
<nav class="navbar fixed-bottom navbar-expand-lg navbar-light">
  <div class="container-fluid d-flex flex-row-reverse me-5 mb-4 mt-2">
      <button class="btn btn-outline-success btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-cart4 m-2">Checkout</i></button>
  </div>
</nav>
@endif

<!-- Scrollable modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Checkout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Id</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Nama Item</h6>
              </th>
              <th class="border-bottom-0" style="width: 100px">
                <h6 class="fw-semibold mb-0">Jumlah</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Harga Pcs</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Harga</h6>
              </th>
            </tr>
          </thead>
          <tbody>
            @if (session()->has('cart'))
            @foreach (session('cart') as $cart )
             @if (isset($cart['id_barang']))
            <tr>
              <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
              <td class="border-bottom-0">
                <p class="mb-0 fw-semibold">{{ $cart['nama_barang'] }}</p>
              </td>
              <td class="border-bottom-0">
                <div class="d-flex align-items-center gap-3">
                  <p class="mb-0 fw-semibold" id="quantity">{{ $cart['kuantitas'] }}</p>
                </div>
              </td>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0 fs-4">{{ number_format($cart['harga_barang'],0,',','.') }}</h6>
              </td>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0 fs-4">{{ number_format($cart['harga_barang'] * $cart['kuantitas'],0,',','.') }}</h6>
              </td>
            </tr> 
            @endif
            @endforeach
            <tr>
              <td class="border-bottom-0"></td>
              <td class="border-bottom-0">
              </td>
              <td class="border-bottom-0">
              </td>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0 fs-4">Total</h6>
              </td>
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0 fs-4">{{ number_format(session('cart')['harga_total'],0,',','.') }}</h6>
              </td>
            </tr>    
            @endif   
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Process</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Pembayaran</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="checkout" method="POST">
      <div class="modal-body">
        <div class="mb-3">
          @csrf
          <label for="exampleInputEmail1" class="form-label">Uang</label>
          <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uang" autofocus>
        </div>
      </div>
      <div class="modal-footer">
        
          
          <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>


@endsection

@section('js')
<script type="text/javascript">

  let CalcuSelect = null;
  let ItemsSelect = null;

  $(document).ready(function() {

      $('#kodebarang').keyup(function() {
          var query = $(this).val();
          if (query != '') {
              var _token = $('input[name="csrf-token"]').val();
              $.ajax({
                  url: '/ajax-autocomplete',
                  method: "GET",
                  data: {
                      query: query,
                      _token: _token
                  },
                  success: function(data) {
                      $('#barangList').fadeIn();
                      $('#barangList').html(data);
                  }
              });
          }else{
            $('#barangList').fadeOut();
          }
      });

      $(document).on('click', 'li', function() {
          $('#search').val($(this).text());
          $('#barangList').fadeOut();
      });



    $('.besar').hover(function(){
      $(this).css('background-color','#d1d1cf')
    },function(){
      $(this).css('background-color','white')
    });

    $('.back').hover(function(){
      $(this).css('background-color','#d1d1cf')
    },function(){
      $(this).css('background-color','white')
    });



    

    $('.box').on('click',function(){
      var bgColor = $(this).css('background-color');
      if (bgColor == 'rgb(255, 255, 255)'){
        $(this).css('background-color','#d1d1cf')
        ItemsSelect = $(this).children()
      }else{
        $(this).css('background-color','rgb(255, 255, 255)')
      }
    })

    $(".besar, .back").click(function(){
      $(this).animate({
        width: '142px',
        height: '120px',
        fontSize: '27px',
        border: '1px solid black',
        margin: '1px',
        opacity : 0.5
      },100,
    function(){
      $(this).animate({
        width: '120px',
        height: '100px',
        fontSize: '25px',
        border: '1px solid black',
        margin: '1px',
        opacity: 1
      },100)
    });
    val = ItemsSelect[2].children
      val = val[0].children
      val = val[0].children
      val = val[2]

    if($(this).val() == 'del'){
      val.value = 0;
      setInterval(() => {
        $('#change').submit();
      }, 2000);
      return 0;
    }

    if(CalcuSelect == null){
      alert('Silahkan Pilih Action')
    }else if(ItemsSelect == null){
      alert('Silahkan Pilih Item')
    }
    

   
    if(CalcuSelect.val() == 'qty' && $(this).val() != 'backspace'){
      console.log(val)
      if(val.value == 0){
        val.value = $(this).val()
      }else{
        val.value += $(this).val()
      }
    }else if($(this).val() == 'backspace'){
      val.value = Math.floor(val.value/10)
      if(val.value == 0){
        val.value = ''
      }
      
    }
    setTimeout(() => {
      $('#change').submit()
    }, 2000);
    
    });
    
    $('.action').on('click',function(){
      let ColorBesar = $(this).css('background-color');
      if(ColorBesar == 'rgb(255, 255, 255)' && CalcuSelect == null){
        $(this).css('background-color','#d1d1cf')
        CalcuSelect = $(this)
      }else if(CalcuSelect != null){
        CalcuSelect.css('background-color','white');
        CalcuSelect = null;
        $(this).css('background-color','#d1d1cf')
        CalcuSelect = $(this)
      }
      else{
        $(this).css('background-color','white')
      }
    });

  
  });

</script>
@endsection