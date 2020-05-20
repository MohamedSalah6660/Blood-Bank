@extends('client.layouts.app')

@foreach($posts as $post)

@section('title')
{{ $post->title }}

@endsection


@section('content')

<div class="container-fluid" style="background-color: #032808 ">
	
	<div class="row">

		<div class="col-md-6">
			
<img src="{{asset('/storage/image/' . $post->thumbnail)}}" style="width: 100% ; height: 250px">  

    <h3 style="font-style:italic; margin-top: 20px; color: #07f42a"> Title :<span style="color:#ccc;"> {{ $post->title }} </span></h3>

<h4 style="color: #07f42a">
	Category Name :
<span style="color: white">{{ $post->category->name }}</span>
</h4>

		</div>



        <div class="col-md-6">


    <h3 style="color:#09c;"> <h5 style="color:#ccc;"> {{ $post->content }}</h5></h3>

</div>

	</div>

</div>

@endforeach

@endsection
