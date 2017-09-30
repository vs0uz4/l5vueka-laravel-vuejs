<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index')->with(compact('users'));
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function remove()
    {

    }
}
