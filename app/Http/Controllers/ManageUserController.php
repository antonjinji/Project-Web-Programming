<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUser()
    {
        $users = User::paginate(10);
        return view('manageUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertUserPage()
    {
        return view('insertUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewUser(Request $request)
    {
        // return $request -> ini saya cuma buat test data nya ada masuk gak;
        $this->validate($request, [
            'name' =>'required|max:100',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:Admin,Member',
            'password' => 'required|min:6|alpha_num|confirmed',
            'password_confirmation' => 'required|same:password',
            'gender' => 'required|in:male,female',
            'address' => 'required',
            'profile_picture' => 'required|mimes:jpg,jpeg,png',
            'birthday' => 'required|date'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->role == "Admin") {
            $user->isAdmin = 1;
        } else if ($request->role == "Member") {
            $user->isAdmin = 0;
        }
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->birthday = $request->birthday;

        $picture = $request->file('profile_picture');
        $picture_name = Uuid::uuid().".".$picture->getClientOriginalExtension();
        $picture_path = public_path('storage/images');
        $picture->move($picture_path, $picture_name);
        $user->profile_picture = $picture_name;
        $user->save();

        return redirect('/homePage/manageUser')->with('success', 'Insert New User Success');
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
        $user = User::find($id);
        return view('updateUser', compact('user'));
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
        //return $id; -> cuma buat test aja
        //return request; -> cuma buat test aja
        $this->validate($request, [
            'name' =>'required|max:100',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:Admin,Member',
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
        if ($request->role == "Admin") {
            $user->isAdmin = 1;
        } else if ($request->role == "Member") {
            $user->isAdmin = 0;
        }
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

        return redirect('/homePage/manageUser')->with('update-success', $user->name.' successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $user = User::find($id);
        $username = $user->name;
        $user->delete();
        return redirect('/homePage/manageUser')->with('delete-success', $username.' successfully removed!');
    }
}
