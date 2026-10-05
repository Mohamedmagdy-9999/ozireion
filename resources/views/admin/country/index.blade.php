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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">country</a></li>
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
                        
                                                <form action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                   
                                                        

                                                       

                                                        

                                                       

                                                        <div class="form-group">
                                                            <label for="">name in english</label>
                                                            <input type="text" name="name_en" class="form-control" value="{{old('name_en')}}" required>

                                                            @if($errors->has('name_en'))
                                                                <div class="error" style="color:red;">{{ $errors->first('name_en') }}</div>
                                                            @endif
                                                           
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">name in arabic</label>
                                                            <input type="text" name="name_ar" class="form-control" value="{{old('name_ar')}}" required>
                                                            @if($errors->has('name_ar'))
                                                                <div class="error" style="color:red;">{{ $errors->first('name_ar') }}</div>
                                                            @endif
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
                                                                                <th>name in english</th>
                                                                                <th>name in arabic</th>
                                                                                <th>action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                                
                                                                                    @foreach ($countries as $key => $country)
                                                                                        <tr>
                                                                                            <td>{{$key+1}}</td>
                                                                                            
                                                                                          
                                                                                            <td>{{$country->name_en}}</td>
                                                                                            <td>{{$country->name_ar}}</td>
                                                                                            
                                                                                           

                                                                                                <td style="text-align: center;">
                                                                                                                                                                                               
                                                                                                    
                                                                                                    @can('edit-country')
                                                                                                        <a href="{{route('country.edit',$country->id)}}" class="btn btn-success">edit</a>
                                                                                                    @endcan

                                                                                                    @can('delete-country')
                                                                                                        <form action="{{ route('country.destroy', $country->id) }}"
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
         

            
		

        
      
