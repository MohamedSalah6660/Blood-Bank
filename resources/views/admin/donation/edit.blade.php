@extends('admin/layouts.app')

@section('title_page')

Edit Donation

@endsection

@section('content')


<div class="container">
  <h2>Edit Donation
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


    {!!Form::model($donations,array('url'=>'admin/donation/'. $donations->id, 'method'=>'put', 'enctype'=>'multipart/form-data' )) !!} 
 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    
    {!! Form::text('patient_name', null , array('placeholder'=> 'patient_name', 'class'=> 'form-control')) !!}
</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::number('patient_age', null , array('placeholder'=> 'patient_age Address', 'class'=> 'form-control')) !!}   
 
 </div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::text('phone', null , array('placeholder'=> 'Phone', 'class'=> 'form-control')) !!}  

</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::text('hospital_name', null , array('placeholder'=> 'hospital_name', 'class'=> 'form-control')) !!}  
</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::text('hospital_address', null , array('placeholder'=> 'hospital_address', 'class'=> 'form-control')) !!}  
</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::textarea('notes', null , array('placeholder'=> 'Notes', 'class'=> 'form-control')) !!}  
</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">

    {!! Form::number('blood_bags', null , array('placeholder'=> 'blood_bags', 'class'=> 'form-control')) !!}  

</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::select('blood_type_id', $bloodtypes , [],  array('placeholder'=> 'blood_types', 'class'=> 'form-control')) !!}

</div>
</div>

 <div class="col-xs-12 col-sm-12 col-md-12">
       
        <div class="form-group">
    {!! Form::select('city_id', $cities ,[] ,array('placeholder'=> 'city', 'class'=> 'form-control')) !!}
</div>
</div>
    


{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  



    </div>
@endsection