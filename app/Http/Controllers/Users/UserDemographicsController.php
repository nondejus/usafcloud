<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\References\Gender;
use App\Http\Controllers\Controller;

class UserDemographicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'gender_id' => ['required', 'numeric', 'exists:genders,id']
        ]);

        $status = auth()->user()->update([
            'gender_id' => Gender::findOrFail($request->gender_id)->id
        ]);

        return redirect()->back();
    }
}
