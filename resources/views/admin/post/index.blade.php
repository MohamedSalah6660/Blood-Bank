@extends('admin/layouts.app')
@section('title_page')
Posts
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
Posts
 Control
  </h2>

    <a class="btn btn-primary" href="{{ url('admin/post/create') }}">Add New post</a>


<form action="{{ route('post.delete') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
              <th style="width: 8px;">
                  </th>
        <th>No</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Category-Name</th>
      </tr>
    </thead>
    <tbody>

	@foreach($posts as $post)
      <tr>
              <td>
        <input type="checkbox" name="posts[]" class="checkboxes" 
        value="{{ $post->id }}" />
      </td>
       <td>{{ (($posts->currentPage() - 1) * $posts->perPage()) + $loop->iteration }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
     <td><img src="{{asset('/storage/image/' . $post->thumbnail)}}" style="width: 200px ; height: 100px"></td>

        <td>{{optional($post->category)->name}}
</td>
        <td>
 
    <a class="btn btn-primary" href="{{ url('admin/post/'.$post->id.'/edit') }}">Edit</a>

                           

        </td>
      </tr>
     

@endforeach
</form>
    </tbody>


  </table>
        <button onclick="return myFunction();" class="btn btn-danger">Delete Checked</button>

      <div class="text-center">{{ $posts->render() }}</div>
</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection