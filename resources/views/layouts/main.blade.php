@include('partials.header')
<body>
      <!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
    @include('partials.sidebar')
    <div class="body-wrapper">
    @include('partials.navbar')

    @yield('container')
    </div>
</div>

@include('partials.footer')

@yield('js')

</html>
  


