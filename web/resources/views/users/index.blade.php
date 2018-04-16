@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-users"></i> Usuarios</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-plus"></i> Crear nuevo</a>
            </div>
        </div>
    </div>
    <div class="media text-muted pt-3 align-content-center" >
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <td>
                        Acciones
                    </td>
                    <td>
                        Usuario
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        Rol
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('users.show', $user) }}"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('users.edit', $user) }}"><i class="far fa-file-alt"></i></a>
                            <a href="{{ route('users.delete', $user) }}"><i class="fas fa-minus-circle"></i></a>
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->role->name }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <small class="d-block text-right mt-3">
                <a href="#">Ver todos</a>
            </small>
@endsection
