<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Audence</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css">

</head> 

<body class="app"> 
@include('layouts.menu')

<div class="app-wrapper">

    @if($errors->any())
	<div class="alert alert-danger">
		<ul>
		@foreach($errors->all() as $err)
			<li>{{$err}}</li>
		@endforeach
		</ul>
	</div>
	@endif
    
    @if(Session::has('error'))
	<div class="alert alert-danger">{{Session::get('error')}}</div>
	@endif
    @if(Session::has('success'))
	<div class="alert alert-success">{{Session::get('success')}}</div>
	@endif

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Edit Agency Detail's</h1>
            <div class="row g-4 mb-4">
                <a href="/audiance"><button class="btn btn-warning" role="button" name="btnSubmit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
</svg> Back</button></a>  
                <div class="col-lg-12 col-lg-6">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">                            
                            <form action="{{url('/edit/'.$agent->id)}}" method="GET">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">Organization</span>
                                    <input type="text" name="txtagencyName" value="{{$agent->agencyName}}" class="form-control" required placeholder="Enter Your Organization / Agency Full Name" aria-label="Username" aria-describedby="basic-addon3">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Owner</span>
                                    <input type="text" name="txtfastname" value="{{$agent->firstname}}" class="form-control" required placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1" >
                                    <input type="text" name="txtlastname" value="{{$agent->lastname}}" class="form-control" placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon4">Phone</span>
                                    <input type="number" name="txtphone" value="{{$agent->phone }}" class="form-control" required placeholder="Phone" aria-label="Username" aria-describedby="basic-addon4">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon5">Email</span>
                                    <input type="email" name="txtEmail" value="{{$agent->email}}" class="form-control" required placeholder="example@example.com" aria-label="Username" aria-describedby="basic-addon5" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon6">Address</span>
                                    <input type="text" name="txtAddress" value="{{$agent->address}}" class="form-control" placeholder="Full Address" aria-label="Username" aria-describedby="basic-addon6">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon8">RM</span>
                                    <input type="text" name="txtRM" value="{{$agent->rln}}" class="form-control" placeholder="RM Number" aria-label="Username" aria-describedby="basic-addon8">
                                </div>
                                <div>
                                    <button class="btn btn-info" role="button" name="btnSubmit">Update</button>
                                </div><br>      
                            </form>                                                      
                        </div>
                    </div>
                </div>               
            </div>
        </div>
</div>

@include('layouts.footer')

 
<!-- Javascript -->          
<script src="/assets/plugins/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Charts JS -->
<script src="/assets/plugins/chart.js/chart.min.js"></script> 
<script src="/assets/js/index-charts.js"></script> 

<!-- Page Specific JS -->
<script src="/assets/js/app.js"></script> 

</body>
</html> 