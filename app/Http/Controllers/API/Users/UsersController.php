<?php

namespace App\Http\Controllers\API\Users;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        $user->avatar = Storage::url($user->avatar);

        return $user;
    }

    public function index()
    {
        $users = User::all();
        return $users;
    }
}
