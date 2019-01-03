@extends('admin/layouts.app')
@section('title_page')

categories

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

  <h2>
Category Control
  </h2>

    <a class="btn btn-primary" href="{{ url('admin/category/create') }}">Add New category</a>



<form action="{{ route('category.delete') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <th style="width: 8px;">

        <th>No</th>
        <th>Name</th>
        <th>Control</th>
      </tr>
    </thead>
    <tbody>
      
	@foreach($categories as $category)
      <tr>
          <td>
        <input type="checkbox" name="categories[]" class="checkboxes" 
        value="{{ $category->id }}" />
      </td>
       <td>{{ (($categories->currentPage() - 1) * $categories->perPage()) + $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>

    <a class="btn btn-primary" href="{{ url('admin/category/'.$category->id.'/edit') }}">Edit</a>

                           
  


          </td>
      </tr>
     

@endforeach
</form>
    </tbody>
  </table>
</div>
      <button onclick="return myFunction();" class="btn btn-danger">Delete Checked</button>

  <div class="text-center">{{ $categories->render() }}</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection