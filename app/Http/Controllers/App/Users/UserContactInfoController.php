<?php

namespace App\Http\Controllers\App\Users;

use App\Rules\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserContactInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'cell_phone' => ['nullable', new Phone],
            'personal_email' => 'nullable|email',
        ]);

        $status = auth()->user()->contact()->update([
            'cell_phone' => $request->cell_phone,
            'personal_email' => $request->personal_email
        ]);

        return redirect()->back();
    }
}
