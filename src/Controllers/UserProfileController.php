<?php

namespace Azuriom\Plugin\Me\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\User;
use Azuriom\Models\Role;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{

    
    /* 
    | Esta funcion nos permite visualizar el perfil
    | de un usuario.
    |
    | me/userName
    */
    public function show($username)
    {
        // Obtenemos el nombre del usuario
        $user = User::where('name', $username)->firstOrFail();

        // Identificamos el rango/rol del usuario
        $role = Role::find($user->role_id);

        // Buscamos la publicaciones hechas por el usuario
        $publications = DB::table('me_feed_publications')
            ->where('user_id', $user->id)
            ->get();

        // Buscamos los comentarios hechos por el usuario
        $comments = DB::table('me_feed_comments')
            ->where('user_id', $user->id)
            ->get();

        // Enlistamos los ultimos seis objetos del inventario del usuario
        $inventoryItems = DB::table('me_inventory_users')
            ->join('me_catalogue', 'me_inventory_users.item_id', '=', 'me_catalogue.id')
            ->where('me_inventory_users.user_id', $user->id)
            ->orderBy('me_inventory_users.created_at', 'desc')
            ->limit(9)
            ->get(['me_catalogue.*', 'me_inventory_users.item_fingerprint']);

            // Enlistamos las ultimas nueve placas del usuario
            $badges = DB::table('me_users_badges')
            ->join('me_badges', 'me_users_badges.badge_id', '=', 'me_badges.id')
            ->where('me_users_badges.owner', $user->id)
            ->orderBy('me_users_badges.created_at', 'desc')
            ->limit(9)
            ->get(['me_badges.*', 'me_users_badges.created_at']);

        /*
        | Con toda la informacion obenida, construimos los datos para
        | mostrar el perfi general del usaurio
        */
        return view('me::profile.userprofile', [
            'user' => $user,
            'role' => $role,
            'publications' => $publications,
            'comments' => $comments,
            'inventoryItems' => $inventoryItems,
            'badges' => $badges,
        ]);
        
    }

    /* 
    | Esta funcion nos permite enlistar todas las placas
    | de un usuario.
    |
    | me/userName/badges
    */
    public function badges($username)
    {
        $user = User::where('name', $username)->firstOrFail();
    
        $badges = DB::table('me_users_badges')
            ->join('me_badges', 'me_users_badges.badge_id', '=', 'me_badges.id')
            ->where('me_users_badges.owner', $user->id)
            ->orderBy('me_users_badges.created_at', 'desc')
            ->paginate(12);
    
        return view('me::profile.userbadges', [
            'user' => $user,
            'badges' => $badges,
        ]);
    }    

    /* 
    | Esta funcion nos permite enlistar todoss los objetos
    | del inventario de un usuario.
    |
    | me/userName/inventory
    */
    public function showInventory($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        $inventoryItems = DB::table('me_inventory_users')
            ->join('me_catalogue', 'me_inventory_users.item_id', '=', 'me_catalogue.id')
            ->where('me_inventory_users.user_id', $user->id)
            ->orderBy('me_inventory_users.created_at', 'desc')
            ->paginate(12);
    
        return view('me::profile.userinventory', [
            'user' => $user, 
            'inventoryItems' => $inventoryItems
        ]);
    }
}
