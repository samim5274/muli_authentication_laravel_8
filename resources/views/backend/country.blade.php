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
                    <button href="#add-new-country-section" class="btn btn-success text-light" data-bs-toggle="collapse">Add +</button>
                </div>
            </div>
        </div>
    </div>
</section><br>

        <div class="container-xl collapse" id="add-new-country-section">
            <h1 class="app-page-title">Add Country Detail's</h1>
            <div class="row g-4 mb-4">
                <div class="col-lg-12 col-lg-6">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <form action="/country-add" method="GET">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">Country Name</span>
                                    <input type="text" name="txtCountry" class="form-control" required placeholder="Coutry Name" aria-label="Username" aria-describedby="basic-addon3">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon4">Client Rate</span>
                                    <input type="number" name="txtClientRate" class="form-control" required placeholder="Client rate" aria-label="Username" aria-describedby="basic-addon4">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon5">Client Advance</span>
                                    <input type="number" name="txtClientAdvance" class="form-control" required placeholder="Client Advance" aria-label="Username" aria-describedby="basic-addon5" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon6">B2B Rate</span>
                                    <input type="number" name="txtB2bRate" class="form-control" placeholder="B2B Rate" aria-label="Username" aria-describedby="basic-addon6">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon8">B2B Advance</span>
                                    <input type="number" name="txtB2bAdvance" class="form-control" placeholder="B2B Advance" aria-label="Username" aria-describedby="basic-addon8">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon8">Remark's</span>
                                    <textarea class="form-control" type="text" name="txtRemark" id="exampleFormControlTextarea1" rows="10">N/A</textarea>
                                </div>
                                <div>
                                    <button class="btn btn-info" role="button" name="btnSubmit">Save</button>
                                </div><br>      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl">
            <h1 class="app-page-title">Country Detail's</h1>
            <div class="row g-4 mb-4">
                <div class="col-lg-12 col-lg-6">
                    <div class="app-card shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <table class="table table-bordered border-success">
                                <thead>
                                    <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Country's</th>
                                    <th scope="col">Client Cost</th>
                                    <th scope="col">Client Advance</th>
                                    <th scope="col">B2B Cost</th>
                                    <th scope="col">B2B Advance</th>
                                    <th scope="col" class="text-center" colspan="2">Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($countrys as $i => $row)
                                    <tr>
                                    <th scope="row" class="text-center">{{++$i}}</th>
                                    <td>{{Str::limit($row['countryName'], 20)}}</td>
                                    <td>{{$row['clientCost']}}</td>
                                    <td>{{$row['clientAdvance']}}</td>
                                    <td>{{$row['agentCost']}}</td>
                                    <td>{{$row['agentAdvance']}}</td>
                                    <td>{{$row['remark']}}</td>
                                    <td class="p-2 text-center"><a href="{{url('/update-country/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination pt-4">
                                {{ $countrys->onEachSide(1)->links() }}
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