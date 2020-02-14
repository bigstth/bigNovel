<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        return view('home');
    }
    public function story($id)
    {
        return view('story',['id'=>$id]);
    }
    public function chapter($id)
    {
        return view('chapter',['id'=>$id]);
    }
    public function ranking()
    {
        return view('ranking');
    }
    public function bookshelf()
    {
        return view('bookshelf');
    }
    public function writer()
    {
        return view('writer');
    }
    public function contact()
    {
        return view('contact');
    }
    public function search()
    {
        return view('search');
    }
}
