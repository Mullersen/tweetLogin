@extends('layouts.app'){{--laravel allows you to replace a slash with a dash in the route of the file--}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @guest
                <p>Please go log in or sign up</p>
                @else
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <form action="/profile" method="GET">
                        @csrf
                        <input type='submit' name='submit' value='Go to Profile'>
                    </form>
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection
