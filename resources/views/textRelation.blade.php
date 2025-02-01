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
<!--//app-header-->
<div class="app-wrapper">

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
                                <th scope="col">Country Name</th>
                                <th scope="col">Id</th>
                                <th scope="col">Date of Birth</th>                                
                                <th scope="col">Plase of Birth</th>
                                <th scope="col">Ex. Date</th>
                                <th scope="col" class="text-center" colspan="2">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($client as $i => $row)
                                <tr>
                                <th scope="row" class="text-center">{{++$i}}</th>
                                <td>{{$row->firstName}}</td>
                                <td>{{$row->country->countryName}}</td>
                                <td></td>                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="p-2 text-center"><a href="{{url('/update-clients/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination pt-4">
                            1 of 1
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