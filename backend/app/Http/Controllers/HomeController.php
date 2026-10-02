<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('Home/index');
    }

    function aboutus()
    {
        return view('Home/aboutus');
    }

    function calendar()
    {
        return view('Home/calendar');
    }

    function contactus()
    {
        return view('Home/contactus');
    }

    function css()
    {
        return view('Home/css');
    }

    function html()
    {
        return view('Home/html');
    }

    function js()
    {
        return view('Home/js');
    }

    function php()
    {
        return view('Home/php');
    }

    function signin()
    {
        return view('Home/signin');
    }

    function signup()
    {
        return view('Home/signup');
    }
    
}
