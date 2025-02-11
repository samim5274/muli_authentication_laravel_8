<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portal - Expenses</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        .loader {
            width: 30px;
            aspect-ratio: 1;
            display: grid;
            border: 4px solid #0000;
            border-radius: 50%;
            border-right-color: #25b09b;
            animation: l15 1s infinite linear;
        }
        .loader::before,
        .loader::after {
            content: "";
            grid-area: 1/1;
            margin: 2px;
            border: inherit;
            border-radius: 50%;
            animation: l15 2s infinite;
        }
        .loader::after {
            margin: 8px;
            animation-duration: 3s;
        }
        @keyframes l15{
            100%{transform: rotate(1turn)}
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
                              </svg> Expenses</button>
                        </div>
                    </div>
                </div>
            </div>
        </section><br>

    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Daily Expenses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/daily-expenses-insert" method="GET">
                        <div class="mb-3">
                            <label for="sender" class="form-label">Account</label>
                            <select class="form-select" name="cbxAccount" id="transactionType" required>
                                <option selected disabled>Select account</option>
                                @foreach($admins as $row)
                                  <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" value="1000" name="txtAmount" class="form-control" id="amount" placeholder="Enter amount" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 font-medium">Category</label>
                            <select id="category" name="category" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}">{{ $row->CatName }}</option>
                                @endforeach
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
                            <label for="remark" class="form-label">Remark</label>
                            <textarea class="form-control" name="txtRemark" id="remark" rows="2" placeholder="Enter remark">N/A</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container-xl">
        <div class="row g-4 mb-4">
            <div class="col-lg-12 col-lg-6 " >
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4 " >
                        <h4 class="stats-type mb-1">Transection Statement</h4>
                        <div class="app-card shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <table class="table table-bordered border-success">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Invoice</th>
                                            <th scope="col">Expenser</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col" colspan="2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($expenses as $i => $row)
                                    <tr>
                                        <th scope="row" class="text-center">{{++$i}}</th>
                                        <td>INV-{{$row->invoice}}</td>
                                        <td>{{$row->exreceived->name}}</td>
                                        <td>${{$row->amount}}/-</td>
                                        @if($row->status == 1)
                                        <td class="text-light bg-info">Submited</td>
                                        @elseif($row->status == 2)
                                        <td class="bg-warning">Processing</td>
                                        @elseif($row->status == 3)
                                        <td class="text-light bg-success">Approve</td>
                                        @elseif($row->status == 4)
                                        <td class="text-light bg-danger">Rejected</td>
                                        @endif
                                        <td class="p-2 text-center"><a href="{{url('/expenses-status/'.$row->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg></a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination pt-4">
                                    {{ $expenses->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Transection Statement</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center" action="/expenses-search" method="GET">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="txtSearchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
                                        <div class="col-auto">
                                            <select name="cbxDate" class="form-select w-auto" >
                                                <option selected value="1">All</option>
                                                <option value="2">This week</option>
                                                <option value="3">This month</option>
                                                <option value="4">Last 3 months</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>					                
							    </div>
							    
							    <div class="col-auto">						    
								    <a class="btn app-btn-secondary" href="#">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
									    Download
									</a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
			    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-Submited-tab" data-bs-toggle="tab" href="#orders-Submited" role="tab" aria-controls="orders-Submited" aria-selected="false">Submited</a>
				    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Paid</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
				</nav>
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body p-3 p-lg-4">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Order</th>
												<th class="cell">Product</th>
												<th class="cell">User</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell">Total</th>
												<th class="cell"></th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($expenses as $i => $row)
											<tr>
												<td class="cell">#INV-{{$row->invoice}}</td>
												<td class="cell"><span class="truncate">{{$row->exreceived->name}} dolor sit amet eget volutpat erat</span></td>
												<td class="cell">{{$row->exreceived->name}}</td>
												<td class="cell"><span>{{$row->created_at->format('d-M')}}</span><span class="note">{{$row->created_at->format('h:i A')}}</span></td>
												@if($row->status == 1)
                                                <td class="cell"><span class="badge bg-info">Submited</span></td>
                                                @elseif($row->status == 2)
                                                <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                                @elseif($row->status == 3)
                                                <td class="cell"><span class="badge bg-success">paid</span></td>
                                                @elseif($row->status == 4)
                                                <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                                @endif
												<td class="cell">${{$row->amount}}/-</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
												<td class="cell"><a class="btn-sm " href="{{url('/expenses-status/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                </svg></a></td>
											</tr>
                                        @endforeach
										</tbody><p class="lead">Total  : ৳ {{$total}}/-</p>
									</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
                            {{ $expenses->onEachSide(1)->links() }}
							</ul>
						</nav><!--//app-pagination-->
						
			        </div><!--//tab-pane-->
			        
			        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
								    
							        <table class="table mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Order</th>
												<th class="cell">Product</th>
												<th class="cell">User</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell">Total</th>
												<th class="cell"></th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($expensesstatusPaid as $i => $row)
											<tr>
												<td class="cell">#INV-{{$row->invoice}}</td>
												<td class="cell"><span class="truncate">{{$row->exreceived->name}} dolor sit amet eget volutpat erat</span></td>
												<td class="cell">{{$row->exreceived->name}}</td>
												<td class="cell"><span>{{$row->created_at->format('d-M')}}</span><span class="note">{{$row->created_at->format('h:i A')}}</span></td>
												@if($row->status == 1)
                                                <td class="cell"><span class="badge bg-info">Submited</span></td>
                                                @elseif($row->status == 2)
                                                <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                                @elseif($row->status == 3)
                                                <td class="cell"><span class="badge bg-success">paid</span></td>
                                                @elseif($row->status == 4)
                                                <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                                @endif
												<td class="cell">${{$row->amount}}/-</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
												<td class="cell"><a class="btn-sm " href="{{url('/expenses-status/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                </svg></a></td>
											</tr>
                                        @endforeach
										</tbody><p class="lead">Total  Paid: ৳ {{$totalPaid}}/-</p>
									</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
                        <nav class="app-pagination">
							<ul class="pagination justify-content-center">
                            {{ $expenses->onEachSide(1)->links() }}
							</ul>
						</nav><!--//app-pagination-->
			        </div><!--//tab-pane-->

                    <!--=============================================================================================================================================================================-->

                    <div class="tab-pane fade" id="orders-Submited" role="tabpanel" aria-labelledby="orders-Submited-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Order</th>
												<th class="cell">Product</th>
												<th class="cell">User</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell">Total</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($expensesstatusSubmited as $i => $row)
											<tr>
												<td class="cell">#INV-{{$row->invoice}}</td>
												<td class="cell"><span class="truncate">{{$row->exreceived->name}} dolor sit amet eget volutpat erat</span></td>
												<td class="cell">{{$row->exreceived->name}}</td>
												<td class="cell"><span>{{$row->created_at->format('d-M')}}</span><span class="note">{{$row->created_at->format('h:i A')}}</span></td>
												@if($row->status == 1)
                                                <td class="cell"><span class="badge bg-info">Submited</span></td>
                                                @endif
												<td class="cell">${{$row->amount}}/-</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
												<td class="cell"><a class="btn-sm " href="{{url('/expenses-status/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                </svg></a></td>
											</tr>
                                        @endforeach
										</tbody><p class="lead">Total  Submit: ৳ {{$totalSubmit}}/-</p>
									</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
                        <nav class="app-pagination">
							<ul class="pagination justify-content-center">
                            {{ $expenses->onEachSide(1)->links() }}
							</ul>
						</nav><!--//app-pagination-->
			        </div><!--//tab-pane-->

                    <!--=============================================================================================================================================================================-->
			        
			        <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Order</th>
												<th class="cell">Product</th>
												<th class="cell">User</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell">Total</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($expensesstatusProcessing as $i => $row)
											<tr>
												<td class="cell">#INV-{{$row->invoice}}</td>
												<td class="cell"><span class="truncate">{{$row->exreceived->name}} dolor sit amet eget volutpat erat</span></td>
												<td class="cell">{{$row->exreceived->name}}</td>
												<td class="cell"><span>{{$row->created_at->format('d-M')}}</span><span class="note">{{$row->created_at->format('h:i A')}}</span></td>
												@if($row->status == 2)
                                                <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                                @endif
												<td class="cell">${{$row->amount}}/-</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
												<td class="cell"><a class="btn-sm " href="{{url('/expenses-status/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                </svg></a></td>
											</tr>
                                        @endforeach
										</tbody><p class="lead">Total  Pending: ৳ {{$totalPending}}/-</p>
									</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
                        <nav class="app-pagination">
							<ul class="pagination justify-content-center">
                            {{ $expenses->onEachSide(1)->links() }}
							</ul>
						</nav><!--//app-pagination-->
			        </div><!--//tab-pane-->

			        <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">Order</th>
												<th class="cell">Product</th>
												<th class="cell">User</th>
												<th class="cell">Date</th>
												<th class="cell">Status</th>
												<th class="cell">Total</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($expensesstatusReject as $i => $row)
											<tr>
												<td class="cell">#INV-{{$row->invoice}}</td>
												<td class="cell"><span class="truncate">{{$row->exreceived->name}} dolor sit amet eget volutpat erat</span></td>
												<td class="cell">{{$row->exreceived->name}}</td>
												<td class="cell"><span>{{$row->created_at->format('d-M')}}</span><span class="note">{{$row->created_at->format('h:i A')}}</span></td>
												@if($row->status == 4)
                                                <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                                @endif
												<td class="cell">${{$row->amount}}/-</td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
												<td class="cell"><a class="btn-sm " href="{{url('/expenses-status/'.$row->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                </svg></a></td>
											</tr>
                                        @endforeach
										</tbody><p class="lead">Total  Cancel: ৳ {{$totalCancel}}/-</p>
									</table>
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
                        <nav class="app-pagination">
                            <ul class="pagination justify-content-center">
                            {{ $expenses->onEachSide(1)->links() }}
                            </ul>
                        </nav><!--//app-pagination-->
			        </div><!--//tab-pane-->
				</div><!--//tab-content-->
				
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    	

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
