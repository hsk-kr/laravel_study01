<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Quiz;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        // 'Teacher' 아니면 home으로 바로 리다이렉트.
        if (Auth::user()->auth_level !== 0) {
            return redirect()->route('home');
        }

        $request->validate([
            'question' => 'required|string',
            'answers' => 'required|array|size:4',
            'right_answer_idx' => 'required|integer'
        ]);

        Quiz::create([
            'question' => $request->question,
            'answers' => $request->answers,
            'right_answer_idx' => $request->right_answer_idx,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('home');
    }
}
