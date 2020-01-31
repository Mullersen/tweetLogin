@extends('layouts/app')
@section('content')
    @guest{{--corresponds- to if not logged in--}}
        <p> Go sign up or log in plz </p>
    @else {{--if there is a user logged in, do this below--}}
     <p> welcome {{Auth::user()->name}} </p> {{--We are using the auth class, which has a method called user. therefore we can access the user-object through the arrow--}}
     <p>Create new tweet</p>
        <form action="/addtweet" method="POST">
            @csrf
        <input type='text' name='author' value='{{Auth::user()->name}}'>
            <div><textarea id='content' cols='100' name='content'>Your Tweet</textarea></div>
            <input type='submit' name='submit' value='Save Tweet'>
        </form>

        @if ($errors->any()) {{--if theform is not validated with the controller will send the user back to the previous view. Flash messages will be shown before the site if compiled. Flash data will be sent with the request and show built in error messages--}}
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif

        <br>
        @foreach ($tweets as $tweet)
            <br>
            <h1>{{$tweet->author}}</h1>
            <p>{{$tweet->content}}</p>
            @if (Auth::user()->name == $tweet->author)
                <form action="/profile" method="POST">
                    @csrf
                    <button name='id'value='{{$tweet->id}}'>Delete Tweet</button>
                </form>
                <form action="/profile/editPost" method="POST">
                    @csrf
                    <button name='id'value='{{$tweet->id}}'>Edit Tweet</button>
                </form>
            <br>
            @endif
        @endforeach

    @endguest
@endsection
