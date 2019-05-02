<?php

namespace App\Http\Controllers\App\Users;

use Illuminate\Http\Request;
use App\Models\References\Gender;
use App\Http\Controllers\Controller;
use App\Models\References\MilitaryBranch;
use App\Models\References\MilitaryRank;

class UserSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user()->load(['contact', 'military']);
        return view('app.users.settings.index', [
            'user' => $user,
            'genders' => Gender::all(),
            'branches' => MilitaryBranch::all(),
            'ranks' => MilitaryRank::all(),
        ]);
    }
}
