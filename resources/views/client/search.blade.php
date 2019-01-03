
<div class="container">
    <br/>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">



    <form class="card card-sm" method="get" action="{{ url('client/search') }}">




                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fa fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" name="search"  type="search" placeholder="Search ">
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success"  type="submit">Search</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
    </div>
</div>

<style type="text/css">
    


    .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>