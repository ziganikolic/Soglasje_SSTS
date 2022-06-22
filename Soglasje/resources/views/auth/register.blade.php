@extends('app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="ime" class="sr-only">ime</label>
                    <input type="text" name="ime" id="ime" placeholder="Ime" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('ime') border-red-500 @enderror" value="{{ old('ime') }}">

                    @error('ime')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="priimek" class="sr-only">priimek</label>
                    <input type="text" name="priimek" id="priimek" placeholder="Priimek" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('priimek') border-red-500 @enderror" value="{{ old('priimek') }}">

                    @error('priimek')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">

                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <select name="oddelek" id="oddelek" class="form-select bg-gray-100 border-2 w-full p-3 rounded-lg">
                        <option>ODDELEK</option>
                        <option value="TR5a">TR/5.a</option>
                        <option value="ET5b">ET/5.b</option>
                        <option value="ET5a">ET/5.a</option>
                        <option value="TM4a">TM/4.a</option>
                        <option value="TM4b">TM/4.b</option>
                        <option value="TM4c">TM/4.c</option>
                        <option value="TR4a">TR/4.a</option>
                        <option value="ET4b">ET/4.b</option>
                        <option value="ET4c">ET/4.c</option>
                      </select>
                </div>

                <div class="mb-4">
                    <select name="vloga" id="vloga" class="form-select bg-gray-100 border-2 w-full p-3 rounded-lg">
                        <option value=1>DIJAK</option>
                        <option value=2>PROFESOR</option>
                      </select>
                </div>

                
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700  text-white px-4 py-4 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection