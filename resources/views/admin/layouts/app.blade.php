@include('admin/layouts.header')

  <!-- =============================================== -->

@include('admin/layouts.navbar')

  <!-- =============================================== -->

@include('admin/layouts.sidebar')

  <!-- =============================================== -->


  <div class="content-wrapper">
 <section class="content-header">


    
  </section>


@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('admin/layouts.footer')