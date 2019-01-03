@extends('admin/layouts.app')
@inject('client', 'App\Client')
@inject('donation', 'App\Donation')
@inject('post', 'App\Post')
@inject('city', 'App\City')
@inject('governorate', 'App\Governorate')
@inject('category', 'App\Category')
@inject('report', 'App\Report')
@inject('contact', 'App\Contact')


@section('title')

Dashboard

@endsection


@section('small_title')

Home Page For Admin
   
@endsection

@section('content')



    <!-- Main content -->
    <section class="content">

<div class="row">

    <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $client->count() }}</h3>

              <p>Count Of Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/client' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>


 <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $category->count() }}</h3>

              <p>Count Of Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/category' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $post->count() }}</h3>

              <p>Count Of Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/post' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

 <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $report->count() }}</h3>

              <p>Count Of Reports</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/report' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

 <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $contact->count() }}</h3>

              <p>Count Of Contacts</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/contact' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>
 <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $governorate->count() }}</h3>

              <p>Count Of Governorates</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/governorate' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $city->count() }}</h3>

              <p>Count Of Cities</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/city' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>

<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $donation->count() }}</h3>

              <p>Count Of Donation Requests</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ 'admin/donation' }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>  

</div>
</div>









      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    You are logged in! 
       </div>









        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      <!-- /.box -->

    </section>
@endsection
