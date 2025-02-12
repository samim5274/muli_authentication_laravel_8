<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Expenses Status</title>
    
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

    <style>
        .card {
            transition: 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>

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
                    <a href="/daily-expenses-view"><button class="btn btn-success text-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
                    </svg> Back</button></a>
                </div>
            </div>
        </div>
    </div>
</section><br>

        <div class="container-xl " >
            <h1 class="app-page-title">Expenses Status: INV-{{$status->invoice}}</h1>
            <div class="row g-4 mb-4">
                <div class="col-lg-12 col-lg-6">
                    <div class="app-card shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4 " >
                            <form action="{{url('/updated-expenses/'.$status->id)}}" method="GET">
                                <div class="mb-3">
                                    <label for="sender" class="form-label">Account: {{$status->exreceived->name}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category: {{$status->excategory->CatName}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="subcategory" class="form-label">Sub-Category: {{$status->exsubcategory->name}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount: {{$status->amount}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="remark" class="form-label">Remark: {{$status->remark}}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="Status" class="form-label">Status</label>
                                    @php
                                        $statuses = [
                                            1 => 'Submitted',
                                            2 => 'Processing',
                                            3 => 'Approved',
                                            4 => 'Rejected'
                                        ];
                                    @endphp

                                    <select class="form-select" name="cbxExpensesStatus" id="Status" required>
                                        <option selected disabled>--Select Status--</option>
                                        @foreach($statuses as $key => $value)
                                            <option value="{{ $key }}" {{ $status->status == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <button type="submit" class="btn btn-primary w-100">Update</button>
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