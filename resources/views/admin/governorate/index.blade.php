@extends('admin/layouts.app')
@section('title_page')

Governorates

@endsection

@section('content')


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    
  @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif

 @if ($message = Session::get('delete'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif

 @if ($message = Session::get('message'))

    <div class="alert alert-info">

        <p>{{ $message }}</p>

    </div>

@endif

  <h2>
Governorates Control
  </h2>

    <a class="btn btn-primary" href="{{ url('admin/governorate/create') }}">Add New Governorate</a>



<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Control</th>
      </tr>
    </thead>
    <tbody>
      
	@foreach($governorates as $governorate)
      <tr>
       <td>{{ (($governorates->currentPage() - 1) * $governorates->perPage()) + $loop->iteration }}</td>
        <td>{{ $governorate->name }}</td>
        <td>

    <a class="btn btn-primary" href="{{ url('admin/governorate/'.$governorate->id.'/edit') }}">Edit</a>

                           
  
    {!! Form::open(['method' => 'DELETE','url' => 'admin/governorate/'. $governorate->id,'style'=>'display:inline', ('onclick="return myFunction();"')]) !!}
      
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
      
                  {!! Form::close() !!}
        </td>
      </tr>
     

@endforeach
    </tbody>
  </table>
</div>
  <div class="text-center">{{ $governorates->render() }}</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection