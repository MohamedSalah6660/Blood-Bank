
<!------ Include the above in your HEAD tag ---------->

<div class="container" >
  
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel"style="width: 100%">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox" >

        <div class="carousel-item active">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100" src="{{ asset('img/img2.jpeg') }}" alt="Second slide" style="height: 450px">
                <div class="mask rgba-black-strong"></div>
            </div>
        
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100" src="{{ asset('img/img3.png') }}" alt="Third slide" style="height: 450px">
                <div class="mask rgba-black-slight"></div>
            </div>
        
        </div>

           <div class="carousel-item " >
            <div class="view" >
                <img class="d-block w-100" src="{{ asset('img/img5.jpg') }}" alt="First slide"style="height: 450px;">
                <div class="mask rgba-black-light"></div>
            </div>
         
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->

    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
                
</div>