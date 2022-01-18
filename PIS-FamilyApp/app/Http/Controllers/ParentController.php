<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()

    { 
        $id=Auth::id();
        return view('parent.menu')->with('id',$id);
     }
}
