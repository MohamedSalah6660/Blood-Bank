@extends('admin/layouts.app')


@section('title_page')

Create Governorates

@endsection

@section('content')

<div class="container">
  <h2>Create Governorates</h2>



                                                        
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

    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">


   {!!Form::open(array('url'=>'admin/governorate', 'method'=>'Post', )) !!} 
	
	{!! Form::text('name', null , array('placeholder'=> 'Name Of Governorate', 'class'=> 'form-control')) !!}

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  

</div>


        </div>

    </div>
@endsection