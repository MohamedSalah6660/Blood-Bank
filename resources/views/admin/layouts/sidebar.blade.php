<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <h3 >{{ Auth::user()->name }}</h3>
        </div>
      </div>
      <!-- search form -->
      <hr>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul>
 
            <li><a href="{{ url('admin/governorate') }}"> <strong>Governorates</strong></a></li>
  <hr>
            <li><a href="{{ url('admin/city') }}"> <strong>Cities</strong></a></li>
  <hr>
            <li><a href="{{ url('admin/category') }}"> <strong>Categories</strong></a></li>
  <hr>
            <li><a href="{{ url('admin/post') }}"> <strong>Posts</strong></a></li>
  <hr>
            <li><a href="{{ url('admin/donation') }}"> <strong>Donation_Requests</strong></a></li>
  <hr>
            <li><a href="{{ url('admin/report') }}"> <strong>All Reports</strong></a></li>
  <hr>
            <li><a href="{{ url('admin/contact') }}"> <strong>All Contacts</strong></a></li>

<hr>
            <li><a href="{{ url('admin/client') }}"> <strong>All Clients</strong></a></li>
  <hr>
         
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
