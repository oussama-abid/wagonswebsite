<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function add()
    {
        return view('add');
    }
    public function list()
    {
        return view('List');
    }
    public function list2()
    {
        return view('List2');
    }
}
