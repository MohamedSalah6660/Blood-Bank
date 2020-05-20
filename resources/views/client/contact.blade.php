<div class="container-fluid" id="contact">


    <div class="text-center">
        
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


    </div>

    

    <div class="text-center">
        
  @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>
@endif
    </div>


  <div class="row">
    <div class="col-md-6">
      
<h2>Contact us</h2>
   
{!! Form::open(['route' => 'contactclient.store' , 'method' => 'Post']) !!}

<div class="form-group">
    {!! Form::label('title', 'Your Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('message', 'Message') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>



{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}


    </div>


    <div class="col-md-6">

<h2>Report</h2>
   

{!! Form::open(['route' => 'reportclient.store' , 'method' => 'Post']) !!}



<div class="form-group">
    {!! Form::label('message', 'Message') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>



{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}





    </div>
  </div>






</div>