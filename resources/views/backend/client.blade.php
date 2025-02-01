<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Country Detail's</title>
    
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

    <div class="app-content pt-3 p-md-3 p-lg-4">
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

    
<section id="button-group">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group item-center">
                    <button href="#add-new-country-section" class="btn btn-success text-light" data-bs-toggle="collapse"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
  <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
</svg> Add</button>
                </div>
            </div>
        </div>
    </div>
</section><br>

    <div class="container-xl collapse" id="add-new-country-section">
        <h1 class="app-page-title">Add New Client Detail's</h1>
        <div class="row g-4 mb-4">
            <div class="col-lg-12 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <form action="/add-client" method="GET" enctype="multipart/form-data">                    
                            <div class="row">
                                <div class="span_1_of_2">
                                    <label for="">Personal Information</label><hr>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Full Name*</span>
                                        <input type="text" name="firstName" class="form-control" required placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1" >
                                        <input type="text" name="lastname"  class="form-control" required placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon4">Phone</span>
                                        <input type="number" name="txtphone" class="form-control" required placeholder="Phone" aria-label="Username" aria-describedby="basic-addon4">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon4">Date of Birth</span>
                                        <input type="date" name="dtpDOB" class="form-control"  aria-label="Username" aria-describedby="basic-addon4">
                                    </div>
                                    <div class="input-group mb-3">
                                        <select name="cbxGender" class="form-control mt-2" id="Gender">
                                            <option selected disabled>Select Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other's</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon4">Email</span>
                                        <input type="email" name="txtEmail" class="form-control" placeholder="email@example.com"  aria-label="Username" aria-describedby="basic-addon4">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon6">Address</span>
                                        <input type="text" name="txtAddress" class="form-control" placeholder="Full Address" aria-label="Username" aria-describedby="basic-addon6">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Please of Birth</span>
                                        <input type="text" name="txtPleaseOfBirth" class="form-control"  placeholder="Please of Birth" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <label for="">Passport Information</label><hr>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Passport Number</span>
                                        <input type="text" name="txtPassportNum"  class="form-control"  placeholder="Passport Number" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Personal No (NID)</span>
                                        <input type="text" name="txtNid" class="form-control"  placeholder="Personal No" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Passport Issue Date Start</span>
                                        <input type="date" name="dtpPIssueDateS"  class="form-control"   aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon5">Passport Issue Date End</span>
                                        <input type="date" name="dtpPIssueDateE"  class="form-control"   aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>       
                                </div>
                                <div class="span_1_of_2">          
                                    <label for="">Emergency contact</label><hr>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon8">Full Name</span>
                                        <input type="text" name="txtEName"  class="form-control" placeholder="Emergency Full Name" aria-label="Username" aria-describedby="basic-addon8">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon8">Emergency Relation</span>
                                        <input type="text" name="txtERelation" class="form-control" placeholder="Emergency Relation" aria-label="Username" aria-describedby="basic-addon8">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon8">Emergency Phone</span>
                                        <input type="number" name="txtEPhone"  class="form-control" placeholder="Emergency Phone" aria-label="Username" aria-describedby="basic-addon8">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Emergency Address</span>
                                        <input type="text" name="txtEAddress"  class="form-control"  placeholder="Emergency Address" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div><br>
                                    <label for="">Reference & Account</label><hr>  
                                    <div class="input-group mb-3">                                        
                                        <select name="cbxRefer" class="form-control mt-2" id="Reference">
                                            <option selected disabled>Select Reference</option>
                                            @foreach($agents as $row)
                                            <option  value="{{$row->id}}">{{$row->agencyName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Contract Amount</span>
                                        <input type="number" name="txtCAmount"  class="form-control"  placeholder="Contract Amount" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Advance</span>
                                        <input type="number" name="txtAdvance"  class="form-control"  placeholder="Advance" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <label for="">Country Details</label><hr>
                                    <div class="input-group mb-3">
                                    <select name="cbxCountry" class="form-control mt-2" id="Reference">
                                            <option selected disabled>Select Country</option>
                                            @foreach($countrys as $rows)
                                            <option  value="{{$rows->id}}">{{$rows->countryName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                
                            </div>
                            <button class="btn btn-success text-light mb-3" role="button" name="btnSubmit">Submite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xl">
        <h1 class="app-page-title">Clients Detail's</h1>
        <div class="row g-4 mb-4">
            <div class="col-lg-12 col-lg-6">
                <div class="app-card shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <table class="table table-bordered border-success">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Passport</th>
                                <th scope="col">Date of Birth</th>                                
                                <th scope="col">Reference</th>
                                <th scope="col">Ex. Date</th>
                                <th scope="col" class="text-center" colspan="2">Country</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $i => $row)
                                <tr>
                                <th scope="row" class="text-center">{{++$i}}</th>
                                <td>{{$row->firstName}} {{$row->lastname}}</td>
                                <td>{{$row->passportNum}}</td>
                                <td>{{$row->dob}}</td>                                
                                <td>{{Str::limit($row->agent->agencyName, 20)}}</td>
                                <td>{{$row->passportIssueDateEnd}}</td>
                                <td>{{Str::limit($row->country->countryName, 10)}}</td>
                                <td class="p-2 text-center"><a href="{{url('/update-clients/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination pt-4">
                        {{ $clients->onEachSide(1)->links() }}
                        </div>
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