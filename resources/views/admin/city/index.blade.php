@extends('admin/layouts.app')
@section('title_page')
Cities

@endsection

@section('content')


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    
  @if ($message = Session::get('delete'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif    

  @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif

  <h2>
Cities Control
  </h2>

    <a class="btn btn-primary" href="{{ url('admin/city/create') }}">Add New City</a>

<form action="{{ route('city.delete') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">

<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th style="width: 8px;"></th>
        <th>No</th>
        <th>Name</th>
        <th>Governorate-Name</th>
      </tr>
    </thead>
    <tbody>

	@foreach($cities as $city)
      <tr>
      <td>
        <input type="checkbox" name="cities[]" class="checkboxes" 
        value="{{ $city->id }}" />
      </td>

       <td>{{ (($cities->currentPage() - 1) * $cities->perPage()) + $loop->iteration }}</td>
       
        <td>{{ $city->name }}</td>
        <td>{{optional($city->governorate)->name}}
</td>
        <td>

    <a class="btn btn-primary" href="{{ url('admin/city/'.$city->id.'/edit') }}">Edit</a>


        </td>
      </tr>
     

@endforeach


</form>

    </tbody>

  </table>
      <button onclick="return myFunction();" class="btn btn-danger">Delete Checked</button>

      <div class="text-center">{{ $cities->render() }}</div>
</div>


<script>
  function myFunction() {

      

      if(!confirm("Are You Sure to delete this?"))
      event.preventDefault();
  }
 </script>



@endsection