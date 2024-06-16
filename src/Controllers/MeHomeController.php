<?php

namespace Azuriom\Plugin\Me\Controllers;

use Azuriom\Http\Controllers\Controller;

class MeHomeController extends Controller
{
    /**
     * Show the home plugin page.
     */
    public function index()
    {
        return view('me::index');
    }
}
