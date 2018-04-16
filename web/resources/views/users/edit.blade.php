@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-users"></i> Editar usuario</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-undo"></i> Volver</a>
            </div>
        </div>
    </div>
    <div class="media text-muted pt-3 align-content-center" >
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-5  alert light-info">

                    <form class="form-horizontal" method="POST" action="{{ route('users.update', $user) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-8 control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-role' : '' }}">
                            <label for="role" class="col-md-8 control-label">Rol de usuario</label>
                            <select name="role" id="" class="form-control">
                                <option value="{{ $user->role_id }}">{{ $user->role->name }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $user->role->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                Editar
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-md-6">
                    <form action="{{ route('profiles.update', $user) }}" method="POST" enctype="multipart/form-data">

                        {!! csrf_field() !!}
                        {{ method_field('put') }}

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Perfil de usuario</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Perfil</td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control" id="profile" rows="5" name="profile">
                                        {{ $user->profile->profile }}
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Avatar</td>
                            </tr>
                            <tr>
                                <td>
                                    @if ($user->profile->avatar != 'avatars/default.png')

                                        <img src="{{ asset('/storage/'.$user->profile->avatar) }}" alt="" class="img-responsive" width="80" height="80">
                                        <input type="file" name="image" class="form-control" >
                                        <a  href="{{ route('profiles.delete', $user) }}" class="btn btn-danger" >Borrar imagen</a>

                                    @else
                                        <img src="{{ asset('/storage/'.$user->profile->avatar) }}" alt="" class="img-responsive" width="80" height="80">
                                        <input type="file" name="image" class="form-control" >
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
