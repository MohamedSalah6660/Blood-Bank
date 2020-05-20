@extends('client/layouts.app')
@section('title')

Donation Request
@endsection

@section('content')


<div class="container ">
  <h2 class="text-center">Create Donation Request</h2>
  @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif
        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>



    {!!Form::open(array('route'=>'donationrequest.store', 'method'=>'Post' )) !!} 

    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
        <div class="form-group  ">
       
  
    {!! Form::text('patient_name', null , array('placeholder'=> 'patient_name', 'class'=> 'form-control ')) !!}
</div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

    {!! Form::number('patient_age', null , array('placeholder'=> 'patient_age', 'class'=> 'form-control')) !!}   
 
 </div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
    {!! Form::text('phone', null , array('placeholder'=> 'Phone', 'class'=> 'form-control')) !!}  

</div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

    {!! Form::text('hospital_name', null , array('placeholder'=> 'hospital_name', 'class'=> 'form-control')) !!}  

</div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">

    {!! Form::text('hospital_address', null , array('placeholder'=> 'hospital_address', 'class'=> 'form-control')) !!}  

</div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
    {!! Form::textarea('notes', null , array('placeholder'=> 'Notes', 'class'=> 'form-control')) !!}  

</div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
    {!! Form::number('blood_bags', null , array('placeholder'=> 'blood_bags', 'class'=> 'form-control')) !!}  


</div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">
       
        <div class="form-group">
    {!! Form::select('blood_type_id', $bloodtypes , [],  array('placeholder'=> 'blood_types', 'class'=> 'form-control')) !!}


</div>
</div>




 <div class="col-sm-10 offset-sm-3 text-center col-md-6">
        <div class="form-group">
            <label for="">Select Governorate:</label>

  <select name="governorate" id="governorate" class="form-control">
    <option value="">select</option>
    @foreach ($governorates as $governorate)
        <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
    @endforeach
                </select>
    </div>
</div>


    <div class="col-sm-10 offset-sm-3 text-center col-md-6">


        <div class="form-group">
                <label for="">Select City:</label>
                <select name="city_id" id="city_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
</div>



    <div class="col-sm-10 offset-sm-3 text-center col-md-6" style="margin-bottom: 10px">

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

   {!! Form::close() !!}       
  </div>

</div>



<script type="text/javascript">

 $('#governorate').on('change', function(e){
        console.log(e);
        var governerate_id = e.target.value;
 
        $.get('{{ url('client/information/create/ajax-state?governerate_id=') }}'+governerate_id, function(data) {
            $('#city_id').empty();
            $.each(data, function(index,subGoverObj){
                $('#city_id').append('<option value="'+subGoverObj.id+'">'+subGoverObj.name+'</option>');
            });
        });
    });
</script>
@endsection