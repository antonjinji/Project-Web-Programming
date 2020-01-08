<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTopic()
    {
        $topics = Topic::paginate(10);
        return view('manageTopic', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTopicPage()
    {
        return view('addTopic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTopic(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required'
        ]);

        $topic = new Topic();
        $topic->user_id = Auth::user()->id;
        $topic->nameTopic = $request->topic;
        $topic->save();

        return redirect('/homePage/manageTopic')->with('addTopic-success', 'Success Add Topic');
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
    public function editTopicPage($id)
    {
        $topic = Topic::find($id);
        return view('updateTopic', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTopic(Request $request, $id)
    {
        $this->validate($request, [
            'topic' => 'required'
        ]);

        $topic = Topic::find($id);
        $topic->nameTopic = $request->topic;
        $topic->save();
        return redirect('/homePage/manageTopic')->with('update-success', 'Success Update Topic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTopic($id)
    {
        $topic = Topic::find($id);
        $name_topic = $topic->nameTopic;
        $topic->delete();
        return redirect('/homePage/manageTopic')->with('delete-success', 'Topic '.$name_topic.' successfully removed');
    }
}
