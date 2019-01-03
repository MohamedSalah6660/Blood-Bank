@extends('admin/layouts.app')

@section('title_page')

Edit Posts

@endsection

@section('content')


<div class="container">
  <h2>Edit Posts
</h2>
             
  
                                                        
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
 


   {!!  Form::model($posts,array('url'=>'admin/post/'.$posts->id, 'method'=>'put', 'files'=>true ))  !!}
    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
  
  {!!Form::text('title', null , array('placeholder'=> 'Title', 'class'=> 'form-control')) !!}

</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!!Form::textarea('content', null , array('placeholder'=> 'Content', 'class'=> 'form-control')) !!}

</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
{!! Form::file('thumbnail', null , array('placeholder'=> 'Image' , 'class'=>'form-control')) !!}

</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">

    {!! Form::select('category_id', $categories , null , array(
      'class'=>'form-control',
      'placeholder' =>'select category'
      )) !!}

  </div>
</div>

  {!! Form::submit('submit',[ 'class'=>'btn btn-primary']) !!}

   {!! Form::close() !!}       
  

</div>





@endsection