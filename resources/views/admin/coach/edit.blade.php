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

                                                
                        
                                                <form action="{{ route('coach.update', $coach->id) }}" method="POST"  enctype="multipart/form-data">
                                                

                                                    @csrf

                                                    @method('PUT')

                                                    

                                                      

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="name"
                                                                class="form-control"
                                                                value="{{ old('name', $coach->name) }}"
                                                            >

                                                        </div>


                                                       

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                Email
                                                            </label>

                                                            <input
                                                                type="email"
                                                                name="email"
                                                                class="form-control"
                                                                value="{{ old('email', $coach->email) }}"
                                                            >

                                                        </div>


                                                        

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                Phone
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="phone"
                                                                class="form-control"
                                                                value="{{ old('phone', $coach->phone) }}"
                                                            >

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">description in english</label>
                                                            <textarea name="desc_en" class="form-control ckeditor">
                                                                {{ $coach->desc_en}}
                                                            </textarea>

                                                            @if($errors->has('desc_en'))
                                                                <div class="error" style="color:red;">{{ $errors->first('desc_en') }}</div>
                                                            @endif
                                                           
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">descriptiom in arabic</label>
                                                            <textarea name="desc_ar" class="form-control ckeditor">
                                                                {{ $coach->desc_ar}}
                                                            </textarea>
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


                                                        

                                                        @if($coach->image)

                                                            <div class="col-md-12 mb-3">

                                                                <img
                                                                    src="{{asset('coaches/' .$coach->image)}}"
                                                                    width="120"
                                                                    height="120"
                                                                    style="object-fit: cover;"
                                                                    class="rounded"
                                                                >

                                                            </div>

                                                        @endif


                                                        

                                                        <div class="col-md-12 mb-3">

                                                            <label class="form-label">
                                                                Categories
                                                            </label>

                                                            <select
                                                                name="categories[]"
                                                                class="form-control select2"
                                                                multiple
                                                            >

                                                                @foreach($categories as $category)

                                                                    <option
                                                                        value="{{ $category->id }}"
                                                                        {{
                                                                            in_array(
                                                                                $category->id,
                                                                                old('categories', $selectedCategories)
                                                                            )
                                                                            ? 'selected'
                                                                            : ''
                                                                        }}
                                                                    >
                                                                        {{ $category->name_en }}
                                                                    </option>

                                                                @endforeach

                                                            </select>

                                                        </div>


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
         

            
		

        
      
