<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontEnd.main');
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');

        return view('clear-cache');
    }
}
