<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function create()
    {

        return view("register.create");

    }

    public function validateStoreAndLogin(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'min:2|max:50',
            'username' => 'regex:/^[^\s]+$/|min:7|unique:users,username|max:20',
            // username must not contain whitespace,
            //username must be unique and less than 20 characters
            'email' => 'email',
            'password'=> 'min:7|max:30'
            // This password is encrypted using  the method
            // 'setPasswordAttribute' in "app\Models\User.php".
            ] );

            // If there is something wrong with the inputs above,
            // the user will be sent back, with an appropriate error message

            // Create the user from attributes and
            // assign it to $user
            $user = User::create( $attributes );

            // The user is now logged in
            auth()->login($user);

            // Go back to the homepage with a success message
            return redirect("/")->with('success','Successful sign-in!');


    }
}
