<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('profiles.index', []);
    }

    public function create() {
        return view('profiles.form', []);
    }
}
