<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
    function home(){
        return view('home');
    }

    function show(){
        return "Student List";
    }

    function add(){
        return "Student added";
    }

    function remove(){
        return "Student removed";
    }
}
