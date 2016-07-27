<?php namespace App\Http\Controllers;

class DynamicPagesController extends Controller{


public function _construct()
{

    $this->middleware('guest');

}


public function edit_profile(){

return view('/profile.edit_profile');

}



}
