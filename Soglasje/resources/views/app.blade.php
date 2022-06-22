<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Soglasje</title>
    </head>
    <body class="bg-gray-200"> 
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                @auth
                @if(auth()->user()->vloga == 1)
                <li>
                    <a href="{{ route('home') }}" class="p-3">Home</a>
                </li>
                @endif
                @endauth
                @auth
                @if(auth()->user()->vloga != 1)
                    <li>
                        <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                    </li>
                @endif
                @endauth
                <li>
                    <a href="{{ route('soglasje') }}" class="p-3">Soglasje</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="{{ route('userSettings') }}" class="p-3">{{ auth()->user()->ime.' '.auth()->user()->priimek }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">  <!--form uporabljen zaradi -> cross-site request forgery (CSRF) -->
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Login</a>
                    </li>
                @endguest
            </ul>
        </nav>

        @yield('content')

        <script src="{{ asset('js/app.js') }}"></script>   <!--ali -> mix -->
    </body>
    {{-- <footer class="bg-gray-200 text-center lg:text-left p-4">
        <div class="text-gray-700 text-center p-4" style="background-color: white;">
          © 2022 Copyright: 
          <a class="text-gray-800" href="#">----</a>
        </div>
    </footer> --}}
</html>
