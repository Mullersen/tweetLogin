@extends('layouts.app')
@section('content')
<p>Edit your tweet here</p>

    {{--@php
        print_r($tweet)
    @endphp--}}


    <form action="/profile/saveTweet" method="POST">
        @csrf
    <input type='text' name='author' value='{{$tweet->author}}'>
        <div><textarea id='content' cols='100' name='content'>{{$tweet->content}}</textarea></div>{{--when i did print_R it printed out an array, which first element (element[0]) contained an object.--}}
        <button name='id' value='{{$tweet->id}}'>Save Tweet</button>
    </form>
    @if ($errors->any()) {{--if theform is not validated with the controller will send the user back to the previous view. Flash messages will be shown before the site if compiled. Flash data will be sent with the request and show built in error messages--}}
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        @endif
@endsection
