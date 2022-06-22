@extends('app')

@section('content')
            <div id="app">
                @if(Auth::check())
                    <router-view :user="{{Auth::user()}}" />
                @else
                    <router-view />
                @endif 
            </div>
            @if(auth()->user()->vloga != 1)
            <div>
                <h1>Prof</h1>
            </div>
            @endif

@endsection