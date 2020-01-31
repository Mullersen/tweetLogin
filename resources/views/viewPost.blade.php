@extends('layouts.app')

@section('content')

<h1>{{$tweet->author}}</h1>
<br>
<p><strong>{{$tweet->content}}</strong></p>
<br>
<br>
<form action="/profile" method="GET">
    @csrf
    <button name='id'value='{{$tweet->id}}'>Go back to profile</button>
</form>

@endsection
