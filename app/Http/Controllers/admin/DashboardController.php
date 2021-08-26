<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(){
       // $users = User::limit(4)->get();
        $users = User::withcount(['posts'=>function($query){
            $query->where('created_at', '<=', Carbon::now()->subDay());
        }])->orderBy('posts_count','DESC')->limit(3)->get();
        return view('admin.dashboard')->with('users',$users);
    }
}
