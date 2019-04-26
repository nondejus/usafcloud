<?php

namespace App\Http\Controllers\App\Users;

use Illuminate\Http\Request;
use App\Models\References\Gender;
use App\Http\Controllers\Controller;

class UserSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user();
        return view('app.users.settings.index', [
            'user' => $user,
            'genders' => Gender::all(),
        ]);
    }
}
