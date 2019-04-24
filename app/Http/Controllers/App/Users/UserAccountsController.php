<?php

namespace App\Http\Controllers\App\Users;

use Image;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('app.users.index');
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
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->nickname = $request->nickname;

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

        // $image_thumb = Image::make($image)->crop(100, 100);
        // $image_thumb = $image_thumb->stream();
        // Storage::disk('s3')->put($path . 'thumbnails/' . $file, $image_thumb->__toString());
    }
}
