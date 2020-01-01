<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Topic;
use App\User;
use App\Question;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionAndEtcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(10);
        return view('homePage')

    }

    public function showAndSearchDataQuestionForHomepage(Request $request){
        $key = '';
        //cek nama="search" ada atau gk
        if(isset($request['search'])){
            $key = $request['search'];
        }
        $questionsAndEtc = Thread::where('name', 'like', '%'.$key.'%')
            ->orwhere('question', 'like', '%'.$key.'%')
            ->paginate(10);
        return view('homePage')->with('questionsAndEtc', $questionsAndEtc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
