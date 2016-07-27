<?php namespace App\Http\Controllers;


use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Route;

class StaticPagesController extends Controller

{

     public function _construct(){

         $this->middleware('csrf');
         $this->middleware('web');
     }


public function about(){



return view('about');

}

}