<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = new User;
        $user = auth()->user();
        if (is_null($user)) {
            abort(401);
        }
        return view('profiles.index', compact('user'));
    }

    public function show(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }
}
