@extends('layouts.app')

<p>Edit your tweet here</p>

@php
    print_r($tweet)
@endphp


<form action="/profile/saveTweet" method="POST">
    @csrf
<input type='text' name='author' value='{{$tweet->author}}'>
    <div><textarea id='content' cols='100' name='content'>{{$tweet->content}}</textarea></div>{{--when i did print_R it printed out an array, which first element (element[0]) contained an object.--}}
    <button name='id' value='{{$tweet->id}}'>Save Tweet</button>
</form>
