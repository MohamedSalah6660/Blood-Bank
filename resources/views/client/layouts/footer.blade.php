<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Footer -->
  <section id="footer">
    <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-xs-12 col-sm-4 col-md-4">

          <h5>Quick links</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="{{ url('/client/home') }}"><i class="fa fa-angle-double-right"></i>Home</a></li>
           <li><a href="{{ url('/client/home#contact') }}"><i class="fa fa-angle-double-right"></i>Contact us</a></li>
            <li><a href="{{ url('client/about') }}"><i class="fa fa-angle-double-right"></i>About us</a></li>
        
     
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Quick links</h5>
          <ul class="list-unstyled quick-links">
                <li><a href="{{ url('/client/donationrequest/create') }}"><i class="fa fa-angle-double-right"></i>Create Donation Request</a></li>

          <li><a href="{{ url('/client/home#donations') }}"><i class="fa fa-angle-double-right"></i>All Donations</a></li>

        <li><a href="{{ url('/client/home#posts') }}"><i class="fa fa-angle-double-right"></i>Medical Posts</a></li>

  
          </ul>
        </div>
 

       
      </div>

 
    </div>
    <div class="text-center" style="color: white; margin-top: 20px">© 2018 BloodBank.com All Rights Reserved

</div>
  </section>
  <!-- ./Footer -->
    <link href="{{ asset('js/nav.js') }}" rel="stylesheet">

</body>
</html>

  <style type="text/css">
    

/* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: #005f0f !important;
}
#footer h5{
  padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
  padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
  font-size:25px;
  -webkit-transition: .5s all ease;
  -moz-transition: .5s all ease;
  transition: .5s all ease;
}
#footer ul.social li:hover a i {
  font-size:30px;
  margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
  color:#ffffff;
}
#footer ul.social li a:hover{
  color:#eeeeee;
}
#footer ul.quick-links li{
  padding: 3px 0;
  -webkit-transition: .5s all ease;
  -moz-transition: .5s all ease;
  transition: .5s all ease;
}
#footer ul.quick-links li:hover{
  padding: 3px 0;
  margin-left:5px;
  font-weight:700;
}
#footer ul.quick-links li a i{
  margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
  #footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}



    
  </style>

