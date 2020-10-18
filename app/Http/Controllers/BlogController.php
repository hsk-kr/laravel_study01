<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function create(){
        return view('blogs.create');
    }

    public function store(Request $request){
        //return $request->all();
/*
        $blog = new Blog;
        
        $blog->user_id = $request->userId;
        $blog->password = $request->userPw;

        $blog->save();
        //return dd($request->all());
*/

        $users = DB::table('users')->get();

        return dd($users->all());

        //return redirect()->back();
    }
}
