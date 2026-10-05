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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">session</a></li>
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

                                                
                                                <form action="{{ route('sessions.update', $session->id) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('PUT')


                                                    <div class="form-group mb-3">

                                                        <label>Session Name In English</label>

                                                        <input type="text"
                                                            name="name_en"
                                                            class="form-control"
                                                            value="{{ old('name_en', $session->name_en) }}">

                                                        @error('name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="form-group mb-3">

                                                        <label>Session Name In Arabic</label>

                                                        <input type="text"
                                                            name="name_ar"
                                                            class="form-control"
                                                            value="{{ old('name_ar', $session->name_ar) }}">

                                                        @error('name_ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>


                                                    <div class="form-group mb-3">

                                                        <label>Price</label>

                                                        <input type="number"
                                                            step="0.01"
                                                            name="price"
                                                            class="form-control"
                                                            value="{{ old('price', $session->price) }}">

                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>


                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-group mb-3">

                                                                <label>Date</label>

                                                                <input type="date"
                                                                    name="date"
                                                                    class="form-control"
                                                                    value="{{ old('date', $session->date) }}">

                                                            </div>

                                                        </div>


                                                        <div class="col-md-6">

                                                            <div class="form-group mb-3">

                                                                <label>Time</label>

                                                                <input type="time"
                                                                    name="time"
                                                                    class="form-control"
                                                                    value="{{ old('time', $session->time) }}">

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div class="form-group mb-3">

                                                        <label>Maximum Attendees</label>

                                                        <input type="number"
                                                            name="max_attendees"
                                                            min="1"
                                                            class="form-control"
                                                            value="{{ old('max_attendees', $session->max_attendees) }}">

                                                    </div>


                                                    <div class="row">


                                                        {{-- Coach --}}
                                                        <div class="col-md-6">

                                                            <div class="form-group mb-3">

                                                                <label>Coach</label>

                                                                <select name="coach_id"
                                                                        class="form-control select2">

                                                                    <option value="">Select Coach</option>

                                                                    @foreach($coaches as $coach)

                                                                        <option value="{{ $coach->id }}"
                                                                            {{ old('coach_id', $session->coach_id) == $coach->id ? 'selected' : '' }}>

                                                                            {{ $coach->name }}

                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>


                                                        {{-- Category --}}
                                                        <div class="col-md-6">

                                                            <div class="form-group mb-3">

                                                                <label>Category</label>

                                                                <select name="category_id"
                                                                        id="category_id"
                                                                        class="form-control select2">

                                                                    <option value="">Select Category</option>

                                                                    @foreach($categories as $category)

                                                                        <option value="{{ $category->id }}"
                                                                            {{ old('category_id', $session->category_id) == $category->id ? 'selected' : '' }}>

                                                                            {{ $category->name_en }}

                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>


                                                        {{-- Sub Category --}}
                                                        <div class="col-md-6">

                                                            <div class="form-group mb-3">
                                                                

                                                                <label>Sub Category</label>

                                                                <select name="sub_category_id"
                                                                        id="sub_category_id"
                                                                        class="form-control select2">

                                                                    <option value="">Select Sub Category</option>

                                                                    @foreach($sub_categories as $sub)

                                                                        <option value="{{ $sub->id }}"
                                                                                data-category="{{ $sub->category_id }}"
                                                                            {{ old('sub_category_id', $session->sub_category_id) == $sub->id ? 'selected' : '' }}>

                                                                            {{ $sub->name_en }}

                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>


                                                        {{-- Type --}}
                                                        <div class="col-md-6">

                                                            <div class="form-group mb-3">

                                                                <label>Type</label>

                                                                <select name="type_id"
                                                                        class="form-control select2">

                                                                    <option value="">Select Type</option>

                                                                    @foreach($types as $type)

                                                                        <option value="{{ $type->id }}"
                                                                            {{ old('type_id', $session->type_id) == $type->id ? 'selected' : '' }}>

                                                                            {{ $type->name_en }}

                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>


                                                        {{-- Branch --}}
                                                        <div class="col-md-6">

                                                            <div class="form-group mb-3">

                                                                <label>Branch</label>

                                                                <select name="branch_id"
                                                                        class="form-control select2">

                                                                    <option value="">Select Branch</option>

                                                                    @foreach($branches as $branch)

                                                                        <option value="{{ $branch->id }}"
                                                                            {{ old('branch_id', $session->branch_id) == $branch->id ? 'selected' : '' }}>

                                                                            {{ $branch->name_en }}

                                                                        </option>

                                                                    @endforeach

                                                                </select>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <button type="submit" class="btn btn-primary">
                                                        Update
                                                    </button>

                                                

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
         

            
		

        
      
