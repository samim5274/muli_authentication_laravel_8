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

    <style>
        body {
            background-color: #f8f9fa;
        }
        .transaction-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        </div>
        
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
                            <button href="#audienceOverview" class="btn btn-success text-light" data-bs-toggle="modal" data-bs-target="#transactionModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                              </svg> Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </section><br>
        
        <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <!-- <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true"> -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transactionModalLabel">Test Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="GET">
                            <div class="mb-3">
                                <label for="testName" class="form-label">Test Name</label>
                                <input type="text" name="txtTestName" class="form-control" id="testName" placeholder="Enter test name" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Price</label>
                                <input type="number" value="1000" name="txtAmount" class="form-control" id="amount" placeholder="Enter price" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-600 font-medium">Category</label>
                                <select id="category" name="category" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                                    <option value="">--Select Category--</option>
                                    
                                </select>
                            </div>
                            <div class="loader" id="loader"></div>
                            <div class="mb-4">
                                <label class="block text-gray-600 font-medium">Sub-category</label>
                                <select id="subcategory" name="subcategory" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                                    <option value=''>--Select Sub Category--</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="testRoom" class="form-label">Room No</label>
                                <input type="number" value="103" name="txtRoom" class="form-control" id="testRoom" placeholder="Enter room No" required>
                            </div>
                            <div class="mb-3">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" name="txtRemark" id="remark" rows="2" placeholder="Enter remark">N/A</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
 
<!-- Javascript -->          
<script src="/assets/plugins/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Charts JS -->
<script src="/assets/plugins/chart.js/chart.min.js"></script> 
<script src="/assets/js/index-charts.js"></script> 

<!-- Page Specific JS -->
<script src="/assets/js/app.js"></script> 

<script>
        $(document).ready(function(){
            var loader = $('#loader');
            var categoryId = $('#subcategory');
            loader.hide();
            $('#category').change(function(){
                var categoryId = $(this).val();
                if(categoryId == "")
                {
                    $("#subcategory").html("<option value='' disabled selected>--Select Category--</option>");
                }
                else
                {
                    loader.show();
                    $.ajax({
                        url:"/getSubCategory/"+categoryId,
                        type:"GET",
                        success:function(data){
                            var subCategory = data.subCategory;
                            var html = "<option value=''>--Select Sub Category--</option>";
                            for(let i =0;i<subCategory.length;i++){
                                html += `
                                <option value="`+subCategory[i]['id']+`">`+subCategory[i]['name']+`</option>
                                `;
                            }
                            $("#subcategory").html(html);
                            loader.hide();
                        }
                    });
                }

            });
        });
    </script>

</body>
</html> 