<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            function imageViewer(){
                return {
                     imageUrl: '',
                     fileChosen(event) {
                     this.fileToDataUrl(event, src => this.imageUrl = src)
                     },
                     fileToDataUrl(event, callback) {
                     if (! event.target.files.length) return
                     let file = event.target.files[0],
                          reader = new FileReader()
                     reader.readAsDataURL(file)
                     reader.onload = e => callback(e.target.result)
                     },
                }
            }
        </script>
    </head>
    <body>
        <div class="col-span-1 bg-background-50 min-h-screen flex flex-col justify-center">
            <div class="w-3/4 mt-6 px-6 py-4 bg-white mx-auto dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-3 gap-4">
                        <div class="">
                            <div class="grid grid-cols-4 gap-2">    
                                <!-- Name -->
                                <div class="col-span-3">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <!-- Age -->
                                <div>
                                    <x-input-label for="age" :value="__('Age')" />
                                    <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus autocomplete="age" />
                                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                </div>
                            </div>
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="bio" :value="__('Description about yourself')" />
                                <textarea name="bio" id="bio" class="w-full h-48 resize-none rounded-md border-gray-300 shadow-sm">{{ old('bio') }}</textarea>
                                <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                            </div>
                        </div>
                        <div class="">
                            <div class="" x-data="imageViewer()">
                                <x-input-label for="profile" :value="__('Profile Picture')" />
                                <div class="flex gap-2">
                                    <template x-if="imageUrl">
                                        <img :src="imageUrl"
                                             class="object-cover rounded border border-gray-200 h-48 w-48"
                                             {{-- style="width: 100px; height: 100px;" --}}
                                        >
                                    </template>
                                    <!-- Show the gray box when image is not available -->
                                    <template x-if="!imageUrl">
                                        <div
                                            class="border rounded border-gray-200 bg-gray-100 h-48 w-48"
                                            {{-- style="width: 100px; height: 100px;" --}}
                                        ></div>
                                    </template>
                                    <div class="flex-1 mt-1 rounded-md border border-dashed border-gray-300 relative">
                                        <input type="file" name="profile" accept="image/*" @change="fileChosen" class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
                                        <div class="text-center p-10 mt-4 absolute top-0 right-0 left-0 m-auto">
                                            <h4>
                                                Drop files anywhere to upload
                                                <br/>or
                                            </h4>
                                            <p class="">Select Files</p>
                                        </div>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('profile')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="bio" :value="__('Likes, Select at least 3')" />
                                <div class="mt-1 border p-2 border-gray-300 rounded w-full h-72 overflow-x-auto">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($tags as $tag)
                                            <div class="p-2 border border-green-500 h-10 rounded-lg flex group">
                                                <input type="checkbox" name="likes[]" value="{{ $tag->id }}" class=" mt-1 me-2 rounded border-green-500" id="">
                                                <div class="">{{ $tag->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('likes')" class="mt-2" />
                            </div>
                        </div>
                        <div class="">
                            <div class="flex h-full flex-col" x-data="imageViewer()">
                                <x-input-label for="validation" :value="__('Valid ID')" />
                                <div class="flex gap-2">
                                    <div class="flex-1 mt-1 rounded-md border border-dashed border-gray-300 relative">
                                        <input type="file" name="validation" accept="image/*" @change="fileChosen" class="cursor-pointer relative block opacity-0 w-full h-full p-12 z-50">
                                        <div class="text-center mt-6 absolute top-0 right-0 left-0 m-auto">
                                            <h4>
                                                Drop files anywhere to upload
                                                <br/>or
                                            </h4>
                                            <p class="">Select Files</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 flex-1">
                                    <template class="" x-if="imageUrl">
                                        <div class="flex flex-col justify-center h-full">
                                            <img :src="imageUrl"
                                                 class="h-96 object-contain rounded border border-gray-200"
                                                 {{-- style="width: 100px; height: 100px;" --}}
                                            >
                                        </div>
                                    </template>
                                    <!-- Show the gray box when image is not available -->
                                    <template x-if="!imageUrl">
                                        <div
                                            class="border rounded border-gray-200 bg-gray-100 h-96"
                                            {{-- style="width: 100px; height: 100px;" --}}
                                        ></div>
                                    </template>
                                </div>
                                <x-input-error :messages="$errors->get('profile')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>
