<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class AddressesController extends Controller
{
    public function index($userId)
    {
        $user = User::find($userId);
        $addresses = $user->addresses;

        return response()->json(['addresses' => $addresses], 200);
    }
}
