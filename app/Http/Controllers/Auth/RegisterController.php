<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    //validation
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'gender' => 'required|in:male,female',
            // 'address' => 'required',
            // 'birthday' => 'required|date',
            // 'profile_picture' => 'required|mimes:jpg,jpeg,png'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $request = request();

        // $picture = $request->file('profile_picture');

        // $profile_name = Uuid::uuid() . "." . $picture->getClientOriginalExtension();

        // //bikin path image nya
        // $picture_path = storage_path('App/public/images');

        // // $profile_picture_url = $picture_path . $profile_picture;

        // //masukkin image nya ke path image yang sudah dibuat
        // $picture->move($picture_path, $profile_name);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'gender' => $data['gender'],
            // 'address' => $data['address'],
            // 'birthday' => $data['birthday'],
            // 'profile_picture' => $profile_name,
        ]);
    }
}
