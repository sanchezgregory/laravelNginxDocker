@extends('layouts.app')

@section('content')
    <div class="panel-heading">
        Lista de roles de usuario

    </div>

    <div class="panel-body">
        <table class="table table-responsive">
            <thead>
            <tr>
                <td>Rol</td>
                <td>Usuarios</td>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>
                        {{ $role->name  }}
                    </td>
                    <td>
                        @foreach($role->users as $user)
                            <ul>
                                <li>{{ $user->name }}, <strong>{{ $user->region->name }}</li> </strong>
                            </ul>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
