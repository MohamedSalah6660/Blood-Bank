@extends('admin/layouts.app')


@section('title_page')

Create City

@endsection

@section('content')

<div class="container">
  <h2>Create City</h2>



                                                        
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



   {!!Form::open(array('url'=>'admin/city', 'method'=>'Post', )) !!}
    
    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
	
	{!! Form::text('name', null , array('placeholder'=> 'Name Of Governorate', 'class'=> 'form-control')) !!}
</div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
    {!! Form::select('governerate_id', $governorates , [] , array('class'=>'form-control')) !!}
</div>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  


    </div>
@endsection