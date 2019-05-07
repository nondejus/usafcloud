<?php

namespace App\Http\Controllers\Users;

use Image;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\References\Gender;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\References\MilitaryBranch;
use App\Models\References\MilitaryRank;

class UserAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user()->load(['contact', 'military']);

        return view('app.users.settings.index', [
            'user' => $user,
            'genders' => Gender::all(),
            'branches' => MilitaryBranch::all(),
            'ranks' => MilitaryRank::all(),
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'nickname' => 'nullable|max:255',
            'avatar' => 'nullable|image'
        ]);

        $user = auth()->user();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'nickname' => $request->nickname,
        ]);

        if ($request->has('avatar')) {

            // Delete old avatar
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            $temp_file_name = Str::random(32) . '.' . $request->file('avatar')->guessClientExtension();
            $temp_file_path = storage_path('app/public/avatars/') . $temp_file_name;

            Image::make($request->file('avatar'))->resize(300, 300)->save($temp_file_path);

            $path = Storage::putFile('avatars', new File($temp_file_path), 'public');

            Storage::disk('local')->delete('public/avatars/' . $temp_file_name);

            $user->avatar = $path;
        }

        $user->save();

        return redirect()->back()->with('status', 'Profile updated!');
    }
}
