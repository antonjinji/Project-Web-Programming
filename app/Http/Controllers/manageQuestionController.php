<?php

namespace App\Http\Controllers;

use App\Question;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class manageQuestionController extends Controller
{
    public function showTopic(){
        $topics = Topic::all();
        return view('insertQuestion', compact('topics'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showQuestion()
    {
        $questions = Question::paginate(10);
        return view('manageQuestion', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddQuestionPage()
    {
        return view('insertQuestion');
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

        return redirect('/homePage/manageQuestion')->with('addQuestion-success', 'Success Add Question');
    }

    public function closedQuestion($id)
    {
        // return $id;
        $question = Question::find($id);
        //  return $question;
        // disini kami pikir bahwa hanya sih admin yang berhak menclosed pertanyaan tersebut.
        if(Auth::user()->isAdmin == 1 && Auth::check()){
            //saya ganti status jadi 1 berarti closed
            $question->status = 1; //1->closed, 0->open
            $question->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
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
    public function editQuestionPage($id)
    {
        $question = Question::find($id);
        $topics = Topic::all();
        return view('updateQuestion', compact('question', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQuestion(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'topic' => 'required'
        ]);

        $question = Question::find($id);
        // $question->status = DB::table('questions')->first()->status;
        $question->topic_id = DB::table('topics')->where('nameTopic', $request->topic)->first()->id;
        $question->question = $request->question;
        // $question->user_id = Auth::user()->id;
        // $question->questionCreationDate = DB::table('questions')->first()->questionCreationDate;
        $question->save();
        return redirect('/homePage/manageQuestion')->with('update-success', 'Success Update Question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('/homePage/manageQuestion')->with('delete-success', 'Successfully removed question');
    }
}
