@extends('app')

@section('content')

<div class="w-11/12 m-auto">
    <div class=" bg-white p-20 rounded-lg mb-4">
        
        <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-lg flex justify-around ">






            <div class="sm:text-center lg:text-left flex-initial p-6 w-1/2">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block xl:inline">Aplikacija za</span>
                <span class="block text-blue-600 xl:inline">vnos soglasij</span>
                </h1>
                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Shranjevanje soglasji, ki so v papirnati obliki, v
                    digitalno obliko. Aplikacija za vnos soglasij omogoča dijakom lažjo in hitrejšo izbiro privolitev,
                    profesorjem pa omogoča lažjo evidenco soglasji. 
                    </p>
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                    @guest
                <div class="rounded-lg shadow w-1/2">
                    <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium  rounded-lg text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10">Login</a>
                </div>
                @endguest
                </div>
            </div>    


            <div class="flex-initial">
                <img class="items-center object-center justify-center" src="{{ asset('img/Profiling_Flatline.png') }}" alt="">
            {{-- SLIKA GRE TUKAJ --}}
            </div>

        </div>



    </div>
</div>


    
@endsection