@extends('admin.layout')
@section('content')

<div class="app-content main-content mt-0">
  <div class="side-app">

      <!-- CONTAINER -->
      <div class="main-container container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h2>manage users</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('users.create') }}">create new user</a>
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
             
              <th>phone</th>
              <th>roles</th>
              <th width="280px">action</th>
            </tr>
            @foreach ($data as $key => $user)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                      <label>{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                  <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">show</a>
                  <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">edit</a>

                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit(trans('main.delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} --}}
                </td>
              </tr>
            @endforeach
            </table>


            {!! $data->render() !!}
      </div>
  </div>
</div>


@endsection