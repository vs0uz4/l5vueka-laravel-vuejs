<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return response()->json(compact('users'), 200);
    }

    public function create()
    {
        
    }

    public function update($id)
    {
        
    }

    public function remove($id)
    {
        
    }
}
