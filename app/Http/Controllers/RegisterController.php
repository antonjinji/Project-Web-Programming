<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class RegisterController extends Controller
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
    public function registerPage()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->isAdmin = 0;

        $picture = $request->file('profile_picture');
        $picture_name = Uuid::uuid().".".$picture->getClientOriginalExtension();
        $picture_path = storage_path('App/public/images');
        $picture->move($picture_path, $picture_name);
        $user->profile_picture = $picture_name;
        $user->save();

        return redirect('/login')->with('success', 'Register Success');
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
