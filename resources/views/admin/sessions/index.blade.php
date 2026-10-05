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
                        
                                                @can('create-sessions')
                                                    <a href="{{route('sessions.create')}}" class="btn btn-info">create</a>
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
                                                                                <th>Name In English</th>
                                                                                <th>Name In Arabic</th>
                                                                                <th>Coach</th>
                                                                                <th>Category</th>
                                                                                <th>Sub Category</th>
                                                                                <th>Type</th>
                                                                                <th>Branch</th>
                                                                                <th>Price</th>
                                                                                <th>Date</th>
                                                                                <th>Time</th>
                                                                                <th>Capacity</th>
                                                                                <th>Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                            
                                                                                
                                                                                    @foreach($sessions as $key => $session)

                                                                                        <tr>

                                                                                            <td>{{ $key + 1 }}</td>

                                                                                            <td>
                                                                                                {{ $session->name_en }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->name_ar }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->coach->name ?? '-' }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->category->name_en ?? '-' }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->subCategory->name_en ?? '-' }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->type->name_en ?? '-' }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->branch->name_en ?? '-' }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ number_format($session->price, 2) }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->date }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ \Carbon\Carbon::parse($session->time)->format('h:i A') }}
                                                                                            </td>

                                                                                            <td>
                                                                                                {{ $session->max_attendees }}
                                                                                            </td>

                                                                                            <td>

                                                                                                @can('edit-sessions')
                                                                                                    <a href="{{ route('sessions.edit', $session->id) }}"
                                                                                                    class="btn btn-sm btn-info">
                                                                                                        Edit
                                                                                                    </a>
                                                                                                @endcan


                                                                                                @can('delete-sessions')
                                                                                                    <form action="{{ route('sessions.destroy', $session->id) }}"
                                                                                                        method="POST"
                                                                                                        style="display:inline-block">

                                                                                                        @csrf
                                                                                                        @method('DELETE')

                                                                                                        <button type="submit"
                                                                                                                class="btn btn-sm btn-danger"
                                                                                                                onclick="return confirm('Are you sure?')">
                                                                                                            Delete
                                                                                                        </button>

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
         

            
		

        
      
