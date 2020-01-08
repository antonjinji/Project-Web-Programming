<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function showProfileUser($id)
    {
        $user = User::find($id);
        return view('profileUser', compact('user'));
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

    // public function showMessageInInbox($id)
    // {
    //     $message = Message::find($id)->paginate(10);
    //     return view('inboxUser', compact('message'));
    // }
    public function showMessageInInbox()
    {
        $messages = Message::where('user_receive_id', '=', Auth::user()->id)->paginate(5);
        // $user = User::find($messages->sender_id);
        return view('inboxUser', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfilePage($id)
    {
        $user = User::find($id);
        return view('updateProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        // return $id;
        // return $request;
        $this->validate($request, [
            'name' =>'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|alpha_num|confirmed',
            'password_confirmation' => 'required|same:password',
            'gender' => 'required|in:male,female',
            'address' => 'required',
            'profile_picture' => 'required|mimes:jpg,jpeg,png',
            'birthday' => 'required|date'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;

        $picture = $request->file('profile_picture');
        $picture_name = Uuid::uuid().".".$picture->getClientOriginalExtension();
        $picture_path = public_path('storage/images');
        $picture->move($picture_path, $picture_name);
        $user->profile_picture = $picture_name;
        $user->birthday = $request->birthday;
        $user->save();
        
        return redirect('/homePage')->with('profileUpdate-success', 'Success updated profile');
    }

    public function sendMessage(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        
        $message = new Message();
        $message->sender_id = Auth::user()->id; // id ambil id akun sekarang
        $message->user_receive_id = $id; //id penerima
        $user = User::find($message->user_receive_id);
        $user_receive = $user->name;

        // $message->sender_name = Auth::user()->name; // ini ambil name akun sekrang
        // $message->sender_profile_picture = Auth::user()->profile_picture;
        $message->message = $request->message;
        $message->messageCreationDate = \Carbon\Carbon::now('Asia/Jakarta');
        $message->save();
        return redirect()->back()->with('sendMessage-succes', 'Success send message to '.$user_receive);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $user = User::find($message->user_receive_id);
        $user_receive = $user->name;

        $message->delete();
        return redirect('/homePage/inbox')->with('delete-succes', 'Message from '.$user_receive.' is successfully removed');
    }
}
