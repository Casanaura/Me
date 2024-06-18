<?php

namespace Azuriom\Plugin\Me\Controllers;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateProfileController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        return view('me::profile.editprofile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'string|max:255',
            'website' => 'url|max:255',
            'bio' => 'string|max:1000',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = '/storage/' . $avatarPath;
        }

        if ($request->hasFile('cover_photo')) {
            $coverPhotoPath = $request->file('cover_photo')->store('cover_photos', 'public');
            $user->cover_photo = '/storage/' . $coverPhotoPath;
        }

        $user->country = $request->input('country');
        $user->website = $request->input('website');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect()->route('me.editProfile')->with('success', 'Profile updated successfully.');
    }
}
