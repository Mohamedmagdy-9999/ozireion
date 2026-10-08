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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">edit</a></li>
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

                                                
                        
                                                <form action="{{ route('product.update', $product->id) }}" method="POST"  enctype="multipart/form-data">
                                                

                                                    @csrf

                                                    @method('PUT')

                                                    

                                                      

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                Name in english
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="name_en"
                                                                class="form-control"
                                                                value="{{ old('name_en', $product->name_en) }}"
                                                            >

                                                        </div>

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                Name in arabic
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="name_ar"
                                                                class="form-control"
                                                                value="{{ old('name_ar', $product->name_ar) }}"
                                                            >

                                                        </div>


                                                       

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                price
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="price"
                                                                class="form-control"
                                                                value="{{ old('price', $product->price) }}"
                                                            >

                                                        </div>


                                                        <div class="form-group">
                                                            <label for="">description in english</label>
                                                            <input type="text" name="desc_en" class="form-control" value="{{$product->desc_en}}" required>

                                                            @if($errors->has('desc_en'))
                                                                <div class="error" style="color:red;">{{ $errors->first('desc_en') }}</div>
                                                            @endif
                                                           
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">descriptiom in arabic</label>
                                                            <input type="text" name="desc_ar" class="form-control" value="{{$product->desc_ar}}" required>
                                                            @if($errors->has('desc_ar'))
                                                                <div class="error" style="color:red;">{{ $errors->first('desc_ar') }}</div>
                                                            @endif
                                                        </div>


                                                       

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                Image
                                                            </label>

                                                            <input
                                                                type="file"
                                                                name="image"
                                                                class="form-control"
                                                            >

                                                        </div>


                                                        

                                                        @if($product->image)

                                                            <div class="col-md-12 mb-3">

                                                                <img
                                                                    src="{{asset('products/' .$product->image)}}"
                                                                    width="120"
                                                                    height="120"
                                                                    style="object-fit: cover;"
                                                                    class="rounded"
                                                                >

                                                            </div>

                                                        @endif




                                                        <div class="form-group row">
                                                            <label for="" class="col-3"></label>
                                                            <div class="col-9">
                                                                <button type="submit" id="plus" class="btn btn-sm btn-primary">update</button>
                                                            </div>
                                                        </div>

                                                        

                                                    

                                                </form>

                                              
                                                
                        
                                                
                        
                                               
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
         

            
		

        
      
