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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">coach</a></li>
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


                                                <form action="{{ route('coach.store') }}" method="POST" enctype="multipart/form-data">
                                                    
                                                    @csrf
                                                    
                                                    

                                                        

                                                        <div class="form-group">
                                                            <label for="">name</label>
                                                            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                                                            @if($errors->has('name'))
                                                                <div class="error" style="color:red;">{{ $errors->first('name') }}</div>
                                                            @endif
                                                        </div>


                                                        

                                                        <div class="form-group">

                                                            <label>
                                                                Email
                                                            </label>

                                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                                                
                                                            @if($errors->has('email'))
                                                                <div class="error" style="color:red;">{{ $errors->first('email') }}</div>
                                                            @endif

                                                        </div>


                                                        

                                                        <div class="form-group">

                                                            <label class="form-label">
                                                                Phone
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="phone"
                                                                class="form-control"
                                                                value="{{ old('phone') }}"
                                                                required
                                                            >
                                                            @if($errors->has('phone'))
                                                                <div class="error" style="color:red;">{{ $errors->first('phone') }}</div>
                                                            @endif

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">description in english</label>
                                                            <textarea name="desc_en" class="form-control ckeditor">
                                                                
                                                            </textarea>

                                                            @if($errors->has('desc_en'))
                                                                <div class="error" style="color:red;">{{ $errors->first('desc_en') }}</div>
                                                            @endif
                                                           
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">description in arabic</label>
                                                            <textarea name="desc_ar" class="form-control ckeditor">
                                                                
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
                                                            @if($errors->has('file'))
                                                                <div class="error" style="color:red;">{{ $errors->first('file') }}</div>
                                                            @endif

                                                        </div>


                                                        

                                                        <div class="form-group">

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
                                                                        {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}
                                                                    >
                                                                        {{ $category->name_en }}
                                                                    </option>

                                                                @endforeach

                                                            </select>

                                                        </div>


                                                    <div class="form-group row">
                                                        <label for="" class="col-3"></label>
                                                        <div class="col-9">
                                                            <button type="submit" id="plus" class="btn btn-sm btn-primary">save</button>
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
         

            
		

        
      
