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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">branch</a></li>
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

                                                
                        
                                                <form action="{{route('branch.update',$branch->id)}}" method="POST" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                   
                                                        

                                                        <div class="form-group">
                                                            <label for="">name in english</label>
                                                            <input type="text" name="name_en" class="form-control" value="{{$branch->name_en}}" required>
                                                            @if($errors->has('name_en'))
                                                                <div class="error" style="color:red;">{{ $errors->first('name_en') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">name in arabic</label>
                                                            <input type="text" name="name_ar" class="form-control" value="{{$branch->name_ar}}" required>
                                                            @if($errors->has('name_ar'))
                                                                    <div class="error" style="color:red;">{{ $errors->first('name_ar') }}</div>
                                                                @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">country</label>
                                                            <select name="country_id" class="form-control" id="">
                                                                <option selected disabled>--</option>
                                                                @php $countries = App\Models\Country::latest()->get(); @endphp
                                                                @foreach ($countries as $item)
                                                                    <option value="{{$item->id}}" {{$item->id == $branch->country_id ? 'selected' : ''}}>{{$item->name_en}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('country_id'))
                                                                <div class="error" style="color:red;">{{ $errors->first('country_id') }}</div>
                                                            @endif
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
         

            
		

        
      
