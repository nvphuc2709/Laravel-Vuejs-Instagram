<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        $user = new User;
        $user = auth()->user();
        if (is_null($user)) {
            abort(401);
        }
        $follow = auth()->user() ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index', compact('user', 'follow'));
    }

    public function show(User $user)
    {
        $follow = auth()->user() ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follow'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect('/profile/');
    }
}
