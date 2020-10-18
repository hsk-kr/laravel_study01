<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Lecture;

class LectureController extends Controller
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
     * Lecture 리스트 페이지
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $params = [
            'lectures' => Lecture::all()->sortByDesc('id')
        ];
        return view('lecture.list', $params);
    }

    /**
     * Lecture 작성 페이지
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('lecture.create');
    }

    /**
     * Lecture 작성 API
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'lecture_goal_desc' => 'required|string',
            'lecture_start_date' => 'required|date',
            'lecture_end_date' => 'required|date',
            'classes' => 'array'
        ]);

        Lecture::create([
            'name' => $request->name,
            'description' => $request->description,
            'lecture_goal_desc' => $request->lecture_goal_desc,
            'lecture_start_date' => $request->lecture_start_date,
            'lecture_end_date' => $request->lecture_end_date,
            'use_nickname' => $request->use_nickname === null ? false : true,
            'use_classes' => $request->use_classes === null ? false : true,
            'classes' => $request->classes
        ]);

        return redirect()->route('lecture.list');
    }
}
