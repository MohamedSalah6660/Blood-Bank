@extends('client.layouts.app')

@section('title')

Register
@endsection
@section('content')

                                                        
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


    {!!Form::open(array('route'=>'registerclient.store', 'method'=>'Post' )) !!} 
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
            <label>Your Name</label>
    
    {!! Form::text('name', null , array( 'class'=> 'form-control')) !!}
</div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
            <label>Phone Number</label>
       
        <div class="form-group">
    {!! Form::number('phone', null , array('class'=> 'form-control')) !!}   
 
 </div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
            <label>Email</label>
       
        <div class="form-group">
    {!! Form::email('email', null , array('class'=> 'form-control')) !!}  
</div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
            <label>Password</label>
    {!! Form::password('password',  array( 'class'=> 'form-control')) !!}  
</div>
</div>
    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

            <label>Confirm Your Password</label>


    {!! Form::password('confirmed-password', array( 'class'=> 'form-control')) !!}

</div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
            <label>Blood Type</label>

    {!! Form::text('blood_type', null , array('class'=> 'form-control')) !!}  

</div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">    
            <label>Birth Day</label>
    {!! Form::date('birth_date', null , array('class'=> 'form-control')) !!}  

</div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
            <label>Last Donate</label>

    {!! Form::date('donation_last_date', null , array( 'class'=> 'form-control')) !!}  

</div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
            <label>Select City</label>

    {!! Form::select('city_id', $cities ,[] ,array( 'class'=> 'form-control')) !!}
</div>
</div>

    <div class="col-sm-10 offset-sm-3 text-center col-md-6" style="margin-bottom: 10px">

    


{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
</div>


@endsection