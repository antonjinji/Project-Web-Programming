<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function insert(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQuestion($id)
    {
        $question = Question::find($id);
        return view('answer', compact('question'));
    }

    // public function showAnswer($id){
    //     $answers = Answer::find($id);
    //     return view('answer', compact('answers'));
    // }

    public function closedQuestion($id)
    {
        // return $id;
        $question = Question::find($id);
        //  return $question;
        // disini kami pikir bahwa hanya sih admin berhak menclosed semua pertanyaan tersebut dan member hanya bisa menclose pertanyaan dia saja.
        if(Auth::user()->isAdmin == 1 || $question->user_id == Auth::user()->id){
            //saya ganti status jadi 1 berarti closed
            $question->status = 1; //1->closed, 0->open
            $question->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function answer(Request $request, $id)
    {
        // return $id;
        // return $request;
        $this->validate($request, [
            'answer' => 'required'
        ]);

        $answer = new Answer();
        $answer->question_id = $id;
        $answer->answer = $request->answer;
        $answer->user_id = Auth::user()->id;
        $answer->answerCreateDate = \Carbon\Carbon::now('Asia/Jakarta');
        $answer->save();

        return redirect()->back();
    }

    public function showEditAnswerPage($id)
    {
        $answer = Answer::find($id);
        return view('updateAnswer', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAnswer(Request $request, $id)
    {
        $this->validate($request, [
            'answer' => 'required'
        ]);

        $answer = Answer::find($id);
        $answer->answer = $request->answer;
        $answer->save();
        return redirect('/homePage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAnswer($id)
    {
        // return $id;
        $answer = Answer::find($id);
        $answer->delete();
        return redirect()->back();
    }
}
