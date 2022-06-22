@extends('app')

@section('content')
<div class="w-7/12 m-auto">
        <div id="app">
          @if(Auth::check())
            <router-view :user="{{Auth::user()}}" />
          @else
            <router-view />
          @endif 
      </div>
</div>
    
@endsection
