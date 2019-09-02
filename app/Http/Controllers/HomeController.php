<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::orderBy('id', 'desc')->paginate(9);
        return view('home')->with([
            'incidents' => $incidents
        ]);
    }

}
