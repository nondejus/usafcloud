<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show(Request $request)
    {
        return $request->user();
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }


    public function destroy()
    {
        //
    }
}
