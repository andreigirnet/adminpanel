<?php

namespace App\Http\Controllers;
use App\Models;
use Illuminate\Http\Request;

class User extends Controller
{

    public function index(){

       return view('user.show');
    }

}
