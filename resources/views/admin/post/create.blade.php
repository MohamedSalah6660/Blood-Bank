@extends('admin/layouts.app')


@section('title_page')

Create Post

@endsection

@section('content')

<div class="container">
  <h2>Create Post</h2>



                                                        
	@if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


   {!!Form::open(array('url'=>'admin/post', 'method'=>'Post', 'files'=>true )) !!} 

    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
	
    {!! Form::text('title', null , array('placeholder'=> 'Title Of Post', 'class'=> 'form-control')) !!}
</div>
</div>


    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::textarea('content', null , array('placeholder'=> 'content Of Post', 'class'=> 'form-control')) !!}
</div>
</div>
    

    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">

    {!! Form::select('category_id', $categories , [] , array(
        'class'=>'form-control',
        'placeholder'=>'Select Category'

        )) !!}
    </div>
</div>


    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::file('thumbnail', null , array('placeholder'=> 'Image' , 'class'=>'form-control')) !!}
</div>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  

</div>


     
@endsection