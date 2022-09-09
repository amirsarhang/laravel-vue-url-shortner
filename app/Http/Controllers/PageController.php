<?php

namespace App\Http\Controllers;

class PageController extends Controller
{

    /**
     * Main Page Controller.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('welcome');
    }
}
