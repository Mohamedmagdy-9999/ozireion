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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">product</a></li>
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
                        
                                                @can('create-products')
                                                    <a href="{{route('product.create')}}" class="btn btn-info">create</a>
                                                @endcan

                                              
                                                
                        
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-md-6 col-xl-12">
                                                        <div class="card overflow-hidden">
                                                            <div class="card-body">
                                                                <div class="table-responsive export-table">
                                                                    <table  id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>image</th>
                                                                                <th>name in english</th>
                                                                                <th>name in arabic</th>
                                                                                <th>price</th>
                                                                                <th>action</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                            
                                                                                
                                                                                    @foreach($products as $product)

                                                                                            <tr>

                                                                                                <td>
                                                                                                    {{ $loop->iteration }}
                                                                                                </td>


                                                                                               

                                                                                                <td>

                                                                                                    @if($product->image)
                                                                                                            
                                                                                                        <img
                                                                                                            src="{{asset('products/' .$product->image)}}"
                                                                                                            width="60"
                                                                                                            height="60"
                                                                                                            style="object-fit: cover;"
                                                                                                            class="rounded"
                                                                                                        >

                                                                                                    @else

                                                                                                        <span class="text-muted">
                                                                                                            No Image
                                                                                                        </span>

                                                                                                    @endif

                                                                                                </td>



                                                                                                <td>
                                                                                                    {{ $product->name_en }}
                                                                                                </td>


                                                                                                

                                                                                                <td>
                                                                                                    {{ $product->name_ar }}
                                                                                                </td>


                                                                                              

                                                                                                <td>
                                                                                                    {{ $product->price }}
                                                                                                </td>


                                                                                               

                                                                                                

                                                                                                <td style="text-align: center;">
                                                                                                                                                                                               
                                                                                                    
                                                                                                    @can('edit-products')
                                                                                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success">edit</a>
                                                                                                    @endcan

                                                                                                    @can('delete-products')
                                                                                                        <form action="{{ route('product.destroy', $product->id) }}"
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
         

            
		

        
      
