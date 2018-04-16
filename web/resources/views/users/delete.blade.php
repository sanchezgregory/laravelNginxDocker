@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-users"></i> Borrar usuario</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-undo"></i> Volver</a>
            </div>
        </div>
    </div>
    <div class="media text-muted pt-3 align-content-center" >
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 offset-md-1 alert light-info">

                    <form class="form-horizontal" method="POST" action="{{ route('users.destroy', $user) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" readonly value="{{ $user->name }}"  autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" readonly  value="{{ $user->email }}" >

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Rol de usuario</label>
                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" readonly value="{{ $user->role->name }}" >

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Borrar
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection