<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use App\Models\Peraturan;
use App\Models\legal_opini;
use App\Models\news;
use App\Models\legal_patnership;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviews = reviews::latest()->get();
        $peraturans = Peraturan::count();
        $opinies = legal_opini::count();
        $news = news::count();
        $patners = legal_patnership::count();
        return view('admin.home' , compact('reviews', 'peraturans', 'opinies', 'news', 'patners'));
    }
}
