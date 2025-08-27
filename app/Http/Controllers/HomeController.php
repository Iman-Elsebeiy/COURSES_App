<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('index.home');
    }

    public function about()
    {

        return view('index.about');
    }
    public function blog()
    {

        return view('index.blog');
    }
    public function contact()
    {

        return view('index.contact');
    }
    public function courses()
    {

        return view('index.courses');
    }

}
