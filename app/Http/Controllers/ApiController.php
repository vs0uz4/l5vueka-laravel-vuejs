<?php

namespace App\Http\Controllers;

use App\User;

class ApiController extends Controller
{
    public function address($userId)
    {
        $user = User::find($userId);
        $addresses = $user->addresses;
        sleep(2);

        return response()->json(['addresses' => $addresses], 200);
    }
}
