@extends('admin.layout')
@section('content')
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

                
            <!-- PAGE-HEADER -->
          
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <h2>manage roles</h2>
                                </div>
                                <div class="pull-right">
                                
                                    <a class="btn btn-success" href="{{ route('roles.create') }}"> create new role</a>
                                
                                </div>
                            </div>
                        </div>


                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif


                            <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th width="280px">action</th>
                            </tr>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">show</a>
                                        
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">edit</a>
                                       
                                        
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        
                                    </td>
                                </tr>
                                @endforeach
                            </table>
        </div>
    </div>
</div>


                            


@endsection