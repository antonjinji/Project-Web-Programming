<?php

namespace App\Http\Controllers;

use App\Question;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyQuestionController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    public function showMyQuestion()
    {
        //note menurut kami, jadi paginate bisa muncul ketika sudah memenuhi kebutuhan.
        //contoh ketika kami bikin paginate(10), maka data yang ada harus lebih dari 10 baru dia muncul paginatenya
        $questions = Question::where('user_id', '=', Auth::user()->id)->paginate(10);
        return view('myQuestion', compact('questions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seeAnswer($id)
    {
        $question = Question::find($id);
        return view('seeAnswer', compact('question'));
    }

    public function closedQuestion($id)
    {
        // return $id;
        $question = Question::find($id);
        //  return $question;
        // disini kami pikir bahwa hanya sih admin berhak menclose semua pertanyaan tersebut dan member hanya bisa menclose pertanyaan dia saja.
        if(Auth::user()->isAdmin == 1 || $question->user_id == Auth::user()->id){
            //saya ganti status jadi 1 berarti closed
            $question->status = 1; //1->closed, 0->open
            $question->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
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
        return view('editQuestion', compact('question', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editQuestion(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'topic' => 'required'
        ]);

        $question = Question::find($id);
        $question->question = $request->question;
        $question->topic_id = DB::table('topics')->where('nameTopic', $request->topic)->first()->id;
        $question->save();

        return redirect('/homePage/myQuestion')->with('edit-success', 'Success Edit Question');
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
        return redirect('/homePage/myQuestion')->with('delete-success', 'Success Deleted Question');
    }
}
