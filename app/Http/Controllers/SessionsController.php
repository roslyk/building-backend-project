<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function login()
    {

    // Return the view that holds the login form
    return view("sessions.create");

    }

    // Create session/log in
    public function create(Request $request)
    {

        $attributes = $request->validate([
            'email' => 'required|email',
            'password'=> 'required|min:7']);

        // Validate the email and password

        // if authentication is successful
        if(auth()->attempt($attributes)){

            // Generate a new session id to minimize risk
            // of session fixation
            session()->regenerate();

            // Go back to homepage with a success message
            return redirect('/')->with('success','Login Successful!');

        }else{
            // If the inputted credentials do not match a user

            return redirect('/login')
            ->withErrors(['email' => 'Credentials could not be matched.'])->withInput();
            // We redirect to the "/login" "GET" route, so the user can retry login

            // We put the error at the emails' error slot

            // withInput makes sure that the inputted data is still there

        }

    }
    // Destroy session/log out user
    public function destroy()
    {

        // logout the authenticated user
        auth()->logout();

        // Redirect to the homepage with a message "Goodbye!"
        return redirect("/")->with("success","Goodbye!");

    }

}

