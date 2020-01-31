<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class LoginController extends Controller
{
    function show(){
        $result = \App\Tweet::all(); //this line tells your model Tweet that it should grab all "objects"/rows from our database.
            return view('/profile', ['tweets' => $result]);
    }
    function showtweet($id){
        $tweet = \App\Tweet::find($id);
        return view('viewPost', ['tweet' => $tweet]);
    }

    function store(Request $request){
        $data = $request->validate([
            'author'=> 'max:50',
            'content'=> 'bail|required|min:5|max:500'
        ]);
        $tweet = new \App\Tweet; //we make a new object - which will be our new row.
        $tweet->author = $request->author; // we assign the values of the new object /the values of the new rows.
        $tweet->content = $request->content;
        $tweet->save(); // we save it in our database.
        return redirect('/profile');
    }

    function delete(Request $request){
        $id = $request->id;
        \App\Tweet::destroy($id);
        return redirect('/profile');
    }

    function edit(Request $request){
        $id = $request->id;
        $tweet =  \App\Tweet::find($id);
        return view('editTweet', ['tweet' => $tweet]);
    }
    function save(Request $request){
        $data = $request->validate([ //if the validation fails it sends the user back to the previous view(by GET method), with an error message. You can access that message through @error
            'author'=> 'max:50',
            'content'=> 'bail|required|min:5|max:500'
        ]);
        $id =$request->id;
        $tweet = \App\Tweet::find($id);
        $tweet->author = $request->author;
        $tweet->content = $request->content;
        $tweet->save();

        return redirect('/profile');
        //$result = \App\Tweet::all();
        //return view('profile', ['tweets' => $result]);
    }

    /* this code also checks id the user is logged in (auth::check), just like @guest the profile view. but here you dont get to see the profile page if you are logged out
    function check(){
        if (Auth::check()){
            return view('profile');
        } else {
            return view('home');
        }
    }
    */
}
