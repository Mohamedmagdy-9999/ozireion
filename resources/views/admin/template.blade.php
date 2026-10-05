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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Templates</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                                                
                        
                                                <form action="{{route('template.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    
                                                    <div class="form-group row">
                                                        <label for="name" class="col-3">title</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="title">
                                                        </div>
                                                    </div>
                                                    
                            
                                                    <div class="form-group row">
                                                        <label for="name" class="col-3">message</label>
                                                        <div class="col-9">
                                                            <textarea name="message" class="form-control ckeditor"></textarea>
                                                        </div>
                                                    </div>

                                                    <a href="{{route('upload')}}" target="blank" class="btn btn-success">Upload image & get link</a>
                                                                            <p>
                                                                                To Attach Image (click upload image & get link) then take link copy then click on image icon in text editor then paste link ! the image will appear then customize width/ height of image then ok.
                                                                            </p>
                            
                                                    
                        
                                                    <div class="form-group row">
                                                        <label for="" class="col-3"></label>
                                                        <div class="col-9">
                                                            <button type="submit" id="plus" class="btn btn-sm btn-primary">submit</button>
                                                        </div>
                                                    </div>

                                                </form>
                                                @if (session()->has('message'))
                                                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                                                @endif
                        
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-md-6 col-xl-12">
                                                        <div class="card overflow-hidden">
                                                            <div class="card-body">
                                                                <div class="table-responsive export-table">
                                                                    <table  id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="wd-15p border-bottom-0">title</th>
                                                                                <th class="wd-15p border-bottom-0">message</th>
                                                                                <th class="wd-15p border-bottom-0">action</th>
                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                                @if ($templates->count() > 0)
                                                                                    @foreach ($templates as $template)
                                                                                        <tr>
                                                                                            <td>{{ $template->title}}</td>
                                                                                            <td>{!! Str::limit($template->message, 100) !!}</td>
                                                                                            
                                                                                        
                                                                                                <td style="text-align: center;">
                                                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$template->id}}">
                                                                                                        edit
                                                                                                    </button>
                        
                                                                                                
                                                                                                    <form action="{{ route('template.destroy', $template->id) }}"
                                                                                                        onsubmit="return confirm('are you sure')"
                                                                                                        method="post">
                                                                                                        @method('delete')
                                                                                                        @csrf
                                                                                                        <button class="btn btn-danger">delete</button>
                                                                                                    </form>
                                                                                                
                                                                                               
                                                                                               
                                                                                                </td>
                                                                                        </tr>

                                                                                        <div class="modal fade" id="edit{{$template->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-xl">
                                                                                              <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">edit template</h1>
                                                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <form action="{{route('template.update', $template->id)}}" method="POST" enctype="multipart/form-data">
                                                                                                        @method('PUT')
                                                                                                        @csrf
                                                                                                        <div class="form-group row">
                                                                                                            <label for="name" class="col-3">title</label>
                                                                                                            <div class="col-9">
                                                                                                                <input type="text" class="form-control" name="title" value="{{$template->title}}">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        
                                                                                
                                                                                                        <div class="form-group row">
                                                                                                            <label for="name" class="col-3">message</label>
                                                                                                            <div class="col-9">
                                                                                                                <textarea name="message" class="form-control ckeditor">
                                                                                                                    {!! $template->message !!}
                                                                                                                </textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                
                                                                                                        
                                                                            
                                                                                                        <div class="form-group row">
                                                                                                            <label for="" class="col-3"></label>
                                                                                                            <div class="col-9">
                                                                                                                <button type="submit" id="plus" class="btn btn-sm btn-primary">submit</button>
                                                                                                            </div>
                                                                                                        </div>
                                        
                                                                                                    </form>
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    @endforeach
                                                                                @else
                                                                                    <tr>
                                                                                        <td colspan="4" style="text-align: center;"><small>No course  Found</small></td>
                                                                                    </tr>
                                                                                @endif
                                                                        
                                                            
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
         

            
		

        
      
