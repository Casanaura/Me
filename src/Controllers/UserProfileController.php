<?php

namespace Azuriom\Plugin\Me\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\User;
use Azuriom\Models\Role;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        $role = Role::find($user->role_id);

        $publications = DB::table('me_feed_publications')
            ->where('user_id', $user->id)
            ->get();

        $comments = DB::table('me_feed_comments')
            ->where('user_id', $user->id)
            ->get();

        $inventoryItems = DB::table('me_inventory_users')
            ->join('me_catalogue', 'me_inventory_users.item_id', '=', 'me_catalogue.id')
            ->where('me_inventory_users.user_id', $user->id)
            ->get(['me_catalogue.*', 'me_inventory_users.item_fingerprint']);

        $badges = DB::table('me_users_badges')
            ->join('me_badges', 'me_users_badges.badge_id', '=', 'me_badges.id')
            ->where('me_users_badges.owner', $user->id)
            ->get(['me_badges.*']);

        return view('me::userprofile', [
            'user' => $user,
            'role' => $role,
            'publications' => $publications,
            'comments' => $comments,
            'inventoryItems' => $inventoryItems,
            'badges' => $badges,
        ]);
    }
}
