<x-guest-layout>
    <style>
        .login_img_section {
        background: linear-gradient(rgba(2,2,2,.7),rgba(0,0,0,.7)),url(https://images.unsplash.com/photo-1650825556125-060e52d40bd0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80) center center;
      }
      </style>
      <div class="h-screen flex">
                <div class="hidden bg-primary-100 lg:flex w-full lg:w-1/2 
                justify-around items-center">
                  {{-- <div 
                        class=" 
                        bg-black 
                        opacity-20 
                        inset-0 
                        z-0"
                        >      
                        </div> --}}
                  {{-- <div class="w-full mx-auto px-20 flex-col items-center space-y-6">
                    <h1 class="text-white font-bold text-4xl font-sans">Simple App</h1>
                    <p class="text-white mt-1">The simplest app to use</p>
                    <div class="flex justify-center lg:justify-start mt-6">
                        <a href="#" class="hover:bg-indigo-700 hover:text-white hover:-translate-y-1 transition-all duration-500 bg-white text-indigo-800 mt-4 px-4 py-2 rounded-2xl font-bold mb-2">Get Started</a>
                    </div>
                  </div> --}}
                  <div class="">
                    <div class="ml-20">
                        <x-application-logo class="w-48 h-48 fill-primary-600" />
                        <h1 class="text-6xl">MATCH <br> ANYTIME, <br> ANYWHERE</h1>
                        <p class="text-3xl">Matchmaker makes it easy to match and stay connected to your favorite people</p>
                    </div>
                </div>
                </div>
                <div class="flex w-full lg:w-1/2 justify-center items-center bg-primary-100 space-y-8">
                  <div class="w-full px-8 md:px-32 lg:px-24">
                    <form action="{{ route('login') }}" method="POST" class="bg-white rounded-md shadow-2xl p-5">
                        @csrf
                        <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
                        <p class="text-sm font-normal text-gray-600 mb-8">Welcome Back</p>
                        <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <input id="email" class=" pl-2 w-full outline-none border-none" type="email" name="email" placeholder="Email Address" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="flex items-center border-2 mb-12 py-2 px-3 rounded-2xl ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fillRule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clipRule="evenodd" />
                        </svg>
                        <input class="pl-2 w-full outline-none border-none" type="password" name="password" id="password" placeholder="Password" />
                        
                        </div>
                        <button type="submit" class="block w-full bg-primary-600 mt-5 py-2 rounded-2xl hover:bg-primary-700 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2">Login</button>
                        <div class="flex justify-center mt-4">
                        {{-- <span class="text-sm ml-2 hover:text-primary-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Forgot Password ?</span> --}}
        
                        <a href="{{ route('register') }}" class="text-sm ml-2 hover:text-primary-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Don't have an account yet?</a>
                        </div>
                        
                    </form>
                  </div>
                  
                </div>
            </div>
    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
