<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home(){
        return view('home');
    }

    function show($id){
        return "Student List:  $id";
    }

    function add(){
        return "Student added";
    }

    function remove($id){
        return "Student removed: $id";
    }
}
