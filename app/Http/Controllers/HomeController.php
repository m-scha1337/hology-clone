<?php

namespace App\Http\Controllers;

use App\Models\Events;

class HomeController extends Controller
{
    public function index(){
        if (auth()->check()&&Events::where('user_fs', auth()->user()->id)->get()->count()>0){
            $events=Events::where("user_fs", auth()->user()->id)->get();
            return view('hology', compact("events"));
        }
        return view("hology");
    }
    public function imprint(){
        return view('imprint');
    }
    public function report(){
        return view('report');
    }
}
