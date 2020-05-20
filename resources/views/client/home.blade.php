@extends('client.layouts.app')

@section('title')

Blood Bank

@endsection





@section('content')
@include('client.layouts.slider')
@include('client.search')

<div style="background-color:#c4d3c5; margin-top: 20px; color: #005f0f" class="container-fluid">
<h1 id="services" class="text-center" style="padding-top: 20px"><strong>Medical Articles</strong></h1>
 
<div class='row'>
        <div class='col-md-12' id="posts">

    @foreach ($posts->chunk(3) as  $posts)
          <div class="row">
 
    @foreach($posts as $post)

        <div class="col-xs-12 col-sm-4">
            <div class="card">
              <a class="img-card" href="{{ route('showpost',
                array('post_title'=>$post->title)) }}">
                <img  alt="" src="{{ asset('/storage/image/'.$post->thumbnail) }}"></a>
               
                <br />
                <div class="card-content">
                    <h4 class="card-title">
                        <a>
                        {{$post->title }}
                        </a>
                    </h4>
                 <h4>{{ optional($post->category)->name }}</h4>
                </div>
                <div class="card-read-more">
                         <a href="{{ route('showpost',
                    array('post_name'=>$post->title)) }}"
                     class="btn btn-link btn-block">
Read Article
                    </a>
                </div>
            </div>
        </div>
        @endforeach  
     </div>
     @endforeach
   </div>
 </div>
 <div class="text-center" style="margin-top: 10px " >

<form  action="{{ url('client/allposts') }}">
  <button class="btn btn-primary">
Read More Articles  </button>

</form>


</div>
      

@include('client.alldonationrequests')
@include('client.contact')



@endsection


