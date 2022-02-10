<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        return Demo::all();
        
        // $data = ['My Name is Khan','and','I am not a terrorist'];
        // return view('about',compact('data'));
    }
}
