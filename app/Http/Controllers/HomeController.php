<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function showLogin()
    {
        // show the form
        return \View::make('login');
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = \Validator::make(\Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return \Redirect::to('login')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(\Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => \Input::get('email'),
                'password' => \Input::get('password')
            );

            // attempt to do the login
            if (\Auth::attempt($userdata))
            {
                $id = \Auth::id();
                $users = \DB::table('users')->where('id', $id)->get();
                if($users[0]->level ==0)
                    return \View::make('welcome');
                elseif($users[0]->level == 1)
//                    \Redirect::to('welcome');
                    var_dump('t2');
                elseif($users[0]->level == 2)
                    return \View::make('welcomeuser')->with(['userId'=>$id]);
                    //return view('service.userindex')->with(['userId'=>$id]);
                    //var_dump('t3');
                    //\Redirect::to('userservice')->with(['userId'=>$id]);

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
//                echo 'SUCCESS!';
            }
            else
                {

                // validation not successful, send back to form
                return \Redirect::to('login');

            }

        }
    }

    public function doLogout()
    {
        \Auth::logout(); // log the user out of our application
        return \Redirect::to('login'); // redirect the user to the login screen
    }

}
