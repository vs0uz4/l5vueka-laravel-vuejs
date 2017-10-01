<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('addresses')->get();

        return view('users.index')->with(compact('users'));
    }

    public function create()
    {
        $input = \Request::only('name', 'email', 'password');

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);
        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuário Cadastrado com Sucesso!');
    }

    public function update($id)
    {
        $input = \Request::only('name', 'email', 'password');

        $user = User::find($id);
        $user->name = $input['name'];
        $user->email = $input['email'];

        if (!empty($input['password'])) {
            $user->password = bcrypt($input['password']);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuário Atualizado com Sucesso!');
    }

    public function remove($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário Removido com Sucesso!');
    }
}
