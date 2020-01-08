<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Topic;
use App\User;
use App\Question;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuestionAndEtcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionsAndEtc = Question::paginate(10);
        return view('homePage', compact('questionsAndEtc'));
    }

    public function showAndSearchDataQuestionForHomepage(Request $request){
        $key = '';
        //cek nama="search" ada atau gk
        if(isset($request['search'])){
            $key = $request['search'];
        }
        // ::where('name', 'like', "%$key%")
        // $questionsAndEtc = Question::where('question', 'like', "%$key%")
        // ->orWhereHas('users', function ($query) use ($search){
        //     $query->where('name', 'like', '%'.$search.'%');
        // })
        // ->paginate(6);

        $questionsAndEtc = Question::whereHas('User', function($query) use ($key) {
            $query->where('name', 'like', '%'.$key.'%');
        })->orwhere('question', 'like', '%'.$key.'%')->paginate(10);

        return view('homePage')->with('questionsAndEtc', $questionsAndEtc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addQuestionPage()
    {
        return view('addQuestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addQuestion(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'topic' => 'required'
        ]);

        $question = new Question();
        $question->question = $request->question;
        $question->topic_id = DB::table('topics')->where('nameTopic', $request->topic)->first()->id;
        $question->user_id = Auth::user()->id;
        $question->questionCreationDate = \Carbon\Carbon::now('Asia/Jakarta');
        $question->save();

        // $user->name = Session::get('name');
        // $user->profile_picture = Session::get('profile_picture');
        // $user->created_at = Session::get('create_at');

        return redirect('/homePage')->with('success', 'Success Insert Question');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
