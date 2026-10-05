@extends('admin.layout')
@section('content')
		

              

                <!--app-content open-->
                <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                
                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <div>
                                    <h1 class="page-title">Dashboard</h1>
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Logs</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 -->
                            <div class="row row-sm">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-header border-bottom">
											
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-bordered text-nowrap border-bottom" >
													<thead>
														<tr>
															<th class="wd-15p border-bottom-0">user name</th>
															<th class="wd-15p border-bottom-0">Log Details</th>
                                                            <th class="wd-15p border-bottom-0">ip address</th>
															<th class="wd-20p border-bottom-0">created at</th>
															
														</tr>
													</thead>
													<tbody>
                                                        @php $logs = App\Models\Log::orderBy('id', 'DESC')->get(); @endphp
                                                        @foreach($logs as $log)
														<tr>
															<td>{{$log->user_name}}</td>
                                                            <td>{{$log->details}}</td>
                                                            <td>{{$log->ip}}</td>
                                                            <td>{{date('Y-m-d H:i a',strtotime($log['created_at']))}}</td>
		
														</tr>
                                                        @endforeach
												
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
                          

                            
                        </div>
                    </div>
                </div>
                    <!-- CONTAINER CLOSED -->
            
@endsection
         

            
		

        
      
