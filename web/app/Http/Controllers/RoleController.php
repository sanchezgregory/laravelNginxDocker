<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::with('users.region')->get();

        return view('roles.index', compact('roles'));
    }
}
