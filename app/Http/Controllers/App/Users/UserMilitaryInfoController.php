<?php

namespace App\Http\Controllers\App\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMilitaryInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'branch_id' => 'nullable|exists:military_branches,id',
            'rank_id' => 'nullable|exists:military_ranks,id',
        ]);

        auth()->user()->military()->update([
            'branch_id' => $request->branch_id,
            'rank_id' => $request->rank_id
        ]);

        return redirect()->back();
    }
}
