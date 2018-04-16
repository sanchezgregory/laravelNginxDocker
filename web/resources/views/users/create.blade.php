@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-users"></i> Crear nuevo usuario</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-undo"></i> Volver</a>
            </div>
        </div>
    </div>
    <div class="media text-muted pt-3 align-content-center" >
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 offset-md-1 alert alert-info" role="alert">
                    <form action="{{ route('users.store') }}" method="post">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Enter name">
                            <small id="nameHelp" class="form-text text-muted">Este es un campo requerido.</small>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter password">
                            <small id="passwordHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password confirm</label>
                            <input type="password" name="confirm-password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Confirm password">
                            <small id="passwordHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
