
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<header>

{{-- 
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{ Auth::guard('web-client')->user()->name }}
    
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('clientedit') }}">Profile</a>
    <a class="dropdown-item" href="{{ route('clientlogout') }}">Logout</a>
  </div>
</div>

</div>


 --}}






<nav style="margin-bottom: 1px;" class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ url('client/home') }}">Blood Bank</a>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a  class="nav-link" href="{{ url('client/home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="{{ url('client/about') }}">About us</a>
      </li>
      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="{{ url('/client/home#contact') }}">Contact us</a>
      </li>
       <li class="nav-item">
        <a style="color: white;" class="nav-link" href="{{ url('client/donationrequest/create') }}">Create Donation Request</a>
      </li>
    </ul>
  </div>
  

  <div style="margin-right: 30px;">

    <ul class="navbar-nav">

   @if (Auth::guard('web-client')->guest())

      <a style="color: white; margin-right: 10px;" href="{{ url('client/login') }}">login</a>
       <a style="color: white;" href="{{ url('client/register/create') }}">Register</a>
@else
      <li  style="margin-right: 30px;" class="nav-item dropdown">
        <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Notification {{ auth()->guard('web-client')->user()->notifications()->count() }}
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#"> 
           @foreach(auth()->guard('web-client')->user()->notifications()->take(5)->latest()->get() as $notification)

<a style="font-size: 20px; margin-left: 5px ;" href="{{ url('client/patientdetails/'.$notification->donations->phone)}}"> {{ $notification->title }}</a><hr>
            @endforeach
        </a>
        </div>
      </li>

       <li class="navbar-right dropdown">
        <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             {{ Auth::guard('web-client')->user()->name }}
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('clientedit') }}">Profile</a>
          <a class="dropdown-item" href="{{ route('clientlogout') }}">Logout</a>


   
        </div>
      </li>

    @endif  
    </ul>
  </div>
</nav>









<style type="text/css">


  .topnav-right {
  float: right;
}
/* Add a black background color to the top navigation */
.topnav {
    background-color: #333;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Add an active class to highlight the current page */
.active {
    background-color: #4CAF50;
    color: white;
}




/* Add a dark background on topnav links and the dropdown button on hover */
.topnav a:hover {
    background-color: #555;
    color: white;
}



/* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}


</style>

<script type="text/javascript">
  
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

</script>
