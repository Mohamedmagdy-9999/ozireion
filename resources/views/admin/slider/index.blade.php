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
                                    <h1 class="page-title">dashboard</h1>
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">slider-</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">dashboard</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 -->
                            <div class="container mt-5">
                                <div class="row mb-5">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            
                                            <div class="card-body">
                                                @if (session()->has('message'))
                                                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                                                @endif
                                                <br>
                        
                                                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                   
                                                        

                                                       

                                                        

                                                       

                                                        <div class="form-group">
                                                            <label for="">image</label>
                                                            <input type="file" name="image" class="form-control">
                                                           
                                                        </div>

                                                   
                                    
                                                    <div class="form-group row">
                                                        <label for="" class="col-3"></label>
                                                        <div class="col-9">
                                                            <button type="submit" id="plus" class="btn btn-sm btn-primary">save</button>
                                                        </div>
                                                    </div>

                                                </form>

                                              
                                                
                        
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-md-6 col-xl-12">
                                                        <div class="card overflow-hidden">
                                                            <div class="card-body">
                                                                <div class="table-responsive export-table">
                                                                    <table  id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>*</th>
                                                                                <th>image</th>
                                                                                <th>action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                                
                                                                                    @foreach ($sliders as $key => $slider)
                                                                                        <tr>
                                                                                            <td>{{$key+1}}</td>
                                                                                            
                                                                                          
                                                                                            <td>
                                                                                                <img src="{{asset('sliders/' .$slider->image)}}" style="width:150px;" alt="">
                                                                                            </td>
                                                                                           

                                                                                                <td style="text-align: center;">
                                                                                                                                                                                               
                                                                                                    
                                                                                                    @can('edit-slider')
                                                                                                        <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-success">edit</a>
                                                                                                    @endcan

                                                                                                    @can('delete-slider')
                                                                                                        <form action="{{ route('slider.destroy', $slider->id) }}"
                                                                                                            onsubmit="return confirm('are you sure')"
                                                                                                            method="post">
                                                                                                            @method('delete')
                                                                                                            @csrf
                                                                                                            <button class="btn btn-danger">delete</button>
                                                                                                        </form>
                                                                                                    @endcan
                                                                                                
                                                                                               
                                                                                               
                                                                                                </td>
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
                                </div>
                            </div>
                          

                            
                        </div>
                    </div>
                </div>
                    <!-- CONTAINER CLOSED -->
            
@endsection
         

            
		

        
      
