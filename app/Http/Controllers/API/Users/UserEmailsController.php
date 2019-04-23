<?php

namespace App\Http\Controllers\API\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserEmailsController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->email;
    }
}