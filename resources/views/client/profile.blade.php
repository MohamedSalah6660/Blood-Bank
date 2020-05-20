@extends('client/layouts.app')

@section('title')

Details of  {{ $clients->name }}
@endsection

@section('content')


  <h2 class="text-center">
Details of  {{ $clients->name }}
  </h2>

  @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>
@endif

                                                      
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


   {!!  Form::model($clients,array('url'=>url(route('clientupdate')), 'method'=>'put', ))  !!}
 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
  
  {!!Form::text('name',null , array('placeholder'=> 'Name', 'class'=> 'form-control')) !!}

</div>
</div>

 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

   {!!Form::email('email',null , array('placeholder'=> 'email', 'class'=> 'form-control')) !!}

 </div>
</div>

 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

   {!!Form::date('birth_date',null , array('placeholder'=> 'birth_date', 'class'=> 'form-control')) !!}

 </div>
</div>

 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

   {!!Form::date('donation_last_date',null , array('placeholder'=> 'birth_date', 'class'=> 'form-control')) !!}

</div>
</div>
 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
   {!!Form::number('phone',null , array('placeholder'=> 'phone', 'class'=> 'form-control')) !!}

 </div>
</div>

 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
<label>Password</label>
   {!!Form::password('password' , array('placeholder'=> 'password', 'class'=> 'form-control')) !!}

 </div>
</div>


 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

<label>Confirm Password</label>
   {!!Form::password('confirm-password' , array('placeholder'=> 'Confirm password', 'class'=> 'form-control')) !!}

 </div>
</div>

 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

   {!!Form::text('blood_type',null , array('placeholder'=> 'blood_type', 'class'=> 'form-control')) !!}

</div>
</div>

 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
   {!!Form::select('city_id', $cities,null , array('placeholder'=> 'Select your City', 'class'=> 'form-control')) !!}
</div>
</div>
  
 
        <div class="col-sm-10 offset-sm-3 text-center col-md-6" style="margin-bottom: 10px">
       
  {!! Form::submit('submit',[ 'class'=>'btn btn-primary']) !!}

   {!! Form::close() !!}       
  
</div>
</div>


        </div>

</div>




  



@endsection