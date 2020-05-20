@extends('admin/layouts.app')

@section('title_page')

Edit Governorates

@endsection

@section('content')


<div class="container">
  <h2>Edit Governorates
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


   {!!  Form::model($cities,array('url'=>'admin/city/'.$cities->id, 'method'=>'put', ))  !!}
 
    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
  
  {!!Form::text('name', null , array('placeholder'=> 'Name Of City', 'class'=> 'form-control')) !!}
  
  </div>
</div>


    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::select('governerate_id', $governorate , null , array(
      'class'=>'form-control',
      'placeholder' =>'sel the'
      )) !!}
</div>
</div>
  
  {!! Form::submit('submit',[ 'class'=>'btn btn-primary']) !!}

   {!! Form::close() !!}       
  

</div>








@endsection