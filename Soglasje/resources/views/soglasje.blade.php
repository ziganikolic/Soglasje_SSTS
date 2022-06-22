@extends('app')

@section('content')
            <div id="app">
                @if(Auth::check())
                    <router-view :user="{{Auth::user()}}" />
                @else
                    <router-view />
                @endif 
            </div>

@endsection
            

