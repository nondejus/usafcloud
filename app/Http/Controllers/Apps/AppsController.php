<?php

namespace App\Http\Controllers\Apps;


use Image;
use Illuminate\Http\File;
use App\Models\Apps\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AppsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super-admin');
    }

    public function index()
    {
        $clients = Client::all();
        return view('app.admin.api.index', [
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return view('app.admin.api.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|string',
            'homepage_url' => 'required|url',
            'avatar' => 'nullable|image',
            'redirect' => 'required|url',
        ]);

        $client = Client::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'homepage_url' => $request->homepage_url,
            'avatar' => '',
            'approved_until' => now()->addDays(30),
            'secret' => Str::random(40),
            'redirect' => $request->redirect,
            'personal_access_client' => false,
            'password_client' => false,
            'revoked' => false,
        ]);

        if ($request->has('avatar')) {

            $temp_file_name = Str::random(32) . '.' . $request->file('avatar')->guessClientExtension();
            $temp_file_path = storage_path('app/public/avatars/') . $temp_file_name;

            Image::make($request->file('avatar'))->resize(300, 300)->save($temp_file_path);

            $path = Storage::putFile('avatars', new File($temp_file_path), 'public');

            Storage::disk('local')->delete('public/avatars/' . $temp_file_name);

            $client->avatar = $path;
        }

        $client->save();

        return redirect()->route('app.admin.api.index');
    }

    public function show(Client $client)
    {
        return view('app.admin.api.show', [
            'client' => $client
        ]);
    }
}
