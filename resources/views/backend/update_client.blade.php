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

    <div class="container-xl" id="add-new-country-section">
        <h1 class="app-page-title">Edit Client Detail's</h1>
        <div class="row g-4 mb-4">
        <a href="{{url('/client-view')}}"><button class="btn btn-warning" role="button" name="btnSubmit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
</svg> Back</button></a>
            <div class="">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <form action="{{url('/edit-client/'.$clients->id)}}" method="GET" enctype="multipart/form-data">                    
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label for="">Personal Information</label><hr>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Full Name*</span>
                                        <input type="text" name="firstName" value="{{$clients->firstName}}" class="form-control" required placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1" >
                                        <input type="text" name="lastname" value="{{$clients->lastname}}" class="form-control" required placeholder="Last Name" aria-label="Username" aria-describedby="basic-addon1" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon4">Phone</span>
                                        <input type="number" name="txtphone" value="{{$clients->phone}}" class="form-control" required placeholder="Phone" aria-label="Username" aria-describedby="basic-addon4">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon4">Date of Birth</span>
                                        <input type="date" name="dtpDOB" value="{{$clients->dob}}" class="form-control"  aria-label="Username" aria-describedby="basic-addon4">
                                    </div>
                                    <div class="input-group mb-3">
                                        <select name="cbxGender" class="form-control mt-2" id="Gender">
                                            <option selected disabled>Select Gender</option>
                                            @if(isset($clients->genderId) && $clients->genderId == 1)
                                            <option selected value="{{$clients->genderId}}">Male</option>
                                            <option  value="{{$clients->genderId}}">Female</option>
                                            <option  value="{{$clients->genderId}}">Other's</option>
                                            @elseif(isset($clients->genderId) && $clients->genderId == 2)
                                            <option  value="{{$clients->genderId}}">Male</option>
                                            <option selected value="{{$clients->genderId}}">Female</option>
                                            <option  value="{{$clients->genderId}}">Other's</option>
                                            @else
                                            <option  value="{{$clients->genderId}}">Male</option>
                                            <option  value="{{$clients->genderId}}">Female</option>
                                            <option selected value="{{$clients->genderId}}">Other's</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon4">Email</span>
                                        <input type="email" name="txtEmail" value="{{$clients->email}}" class="form-control"  aria-label="Username" aria-describedby="basic-addon4">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon6">Address</span>
                                        <input type="text" name="txtAddress" value="{{$clients->address}}" class="form-control" placeholder="Full Address" aria-label="Username" aria-describedby="basic-addon6">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Please of Birth</span>
                                        <input type="text" name="txtPleaseOfBirth" value="{{$clients->plaseOfBirth}}" class="form-control"  placeholder="Please of Birth" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <label for="">Passport Information</label><hr>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Passport Number</span>
                                        <input type="text" name="txtPassportNum" value="{{$clients->passportNum}}" class="form-control"  placeholder="Passport Number" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Country Code</span>
                                        <input type="text" name="txtCountryCode" value="{{$clients->countryCode}}" class="form-control"  placeholder="Country Code: BGD" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Passport Authority</span>
                                        <input type="text" name="txtPassAuth" value="{{$clients->passportAuthority}}" class="form-control"  placeholder="Passport Authority" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Personal No (NID)</span>
                                        <input type="text" name="txtNid" value="{{$clients->nidNumm}}" class="form-control"  placeholder="Personal No" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Passport Issue Date Start</span>
                                        <input type="date" name="dtpPIssueDateS" value="{{$clients->passportIssueDateStart}}" class="form-control"   aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Passport Issue Date End</span>
                                        <input type="date" name="dtpPIssueDateE" value="{{$clients->passportIssueDateEnd}}" class="form-control"   aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>     
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Remark</span>
                                        <input type="text" name="txtRemark" value="{{$clients->remark}}" class="form-control"  placeholder="Remark's" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>    
                                </div>
                                <div class="col-12 col-lg-6">          
                                    <label for="">Other's Information</label><hr>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Father's Name</span>
                                        <input type="text" name="txtFatherName" value="{{$clients->fatherName}}" class="form-control"  placeholder="Father's name" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Mother's Name</span>
                                        <input type="text" name="txtMotherName" value="{{$clients->motherName}}" class="form-control"  placeholder="Mother's name" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Spouse Name</span>
                                        <input type="text" name="txtSpouseName" value="{{$clients->spouseName}}" class="form-control"  placeholder="Spouse name" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Spouse Date of Birth</span>
                                        <input type="date" name="dtpSpouseDob" value="{{$clients->s_dob}}" class="form-control" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Spouse Address</span>
                                        <input type="text" name="txtSpouseAddress" value="{{$clients->s_address}}" class="form-control"  placeholder="Spouse address" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <label for="">Emergency contact</label><hr>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon8">Full Name</span>
                                        <input type="text" name="txtEName" value="{{$clients->emgName}}" class="form-control" placeholder="Emergency Full Name" aria-label="Username" aria-describedby="basic-addon8">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon8">Emergency Relation</span>
                                        <input type="text" name="txtERelation" value="{{$clients->emgRelation}}" class="form-control" placeholder="Emergency Relation" aria-label="Username" aria-describedby="basic-addon8">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon8">Emergency Phone</span>
                                        <input type="number" name="txtEPhone" value="{{$clients->emgPhone}}" class="form-control" placeholder="Emergency Phone" aria-label="Username" aria-describedby="basic-addon8">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Emergency Address</span>
                                        <input type="text" name="txtEAddress" value="{{$clients->emgAddress}}" class="form-control"  placeholder="Emergency Address" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div><br>
                                    <label for="">Reference & Account</label><hr>  
                                    <div class="input-group mb-3">                                        
                                        <select name="cbxRefer" class="form-control mt-2" id="Reference">
                                            <option>Select Reference</option>
                                            <option selected value="{{$clients->agent->id}}">{{$clients->agent->agencyName}}</option>
                                            @foreach($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->agencyName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Contract Amount</span>
                                        <input type="number" name="txtCAmount" value="{{$clients->countructAmount}}" class="form-control"  placeholder="Contract Amount" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon5">Advance</span>
                                        <input type="number" name="txtAdvance" value="{{$clients->advance}}" class="form-control"  placeholder="Advance" aria-label="Username" aria-describedby="basic-addon5" >
                                    </div>
                                    <label for="">Country Details</label><hr>
                                    <div class="input-group mb-3">
                                    <select  name="cbxCountry" class="form-control mt-2" id="Reference">
                                        <option>Select country</option>
                                        <option selected value="{{$clients->country->id}}">{{$clients->country->countryName}}</option>
                                        @foreach($countrys as $country)
                                        <option value="{{$country->id}}">{{$country->countryName}}</option>
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