<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex justify-between">
                <div>{{ __('Home') }}</div>
                <a class="text-sm font-normal bg-secondary-500 rounded-lg text-white px-4 py-2 xl:hidden">Match</a>
            </div>
        </h2>
    </x-slot>

    <div class="flex justify-center ps-12">
        <div class="xl:w-2/6 p-5 me-5 hidden xl:block">
            @include('posts._match-panel')
        </div>
        <div class="flex flex-col gap-5 w-full xl:w-4/6 flex-shrink-0 text-slate-800 dark:text-white py-5 pe-12 overflow-y-scroll h-[86vh]">
                @verified
                    <div class="bg-white shadow-sm dark:bg-slate-700 rounded-xl p-5">
                        <div class="flex mb-5">
                            <a href="{{ route('profile.show', ['user' => auth()->user()->id]) }}" class="flex">
                            <x-profile-picture :src="asset(auth()->user()->profile->url)" />
                            </a>
                            <span class="pt-3 font-bold">{{ auth()->user()->name }}</span>
                        </div>
                        <div>
                            <form action="{{ route('post.post') }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <textarea name="content" class="w-full h-28 resize-none rounded-md border-none shadow-md" placeholder="Post About Something" required></textarea>
                                <div class="" x-data="imageViewer()">
                                    <x-text-input accept="image/*" @change="fileChosen" name="file" type="file" class="w-full mt-3 p-2 bg-primary-200" />
                                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                                    <template class="" x-if="imageUrl">
                                        <div class="flex flex-col justify-center mt-4 h-full">
                                            <img :src="imageUrl"
                                                class=" rounded border border-gray-200"
                                            >
                                        </div>
                                    </template>
                                </div>
                                <div class="flex justify-end"><button class="bg-primary-500 text-white font-bold px-7 text-md py-2 rounded-full mt-3">POST</button></div>
                            </form>
                        </div>
                    </div>
                @endverified
                @foreach ($posts as $post)
                    <div class="bg-white shadow-sm dark:bg-slate-700 rounded-xl">
                        <div class="flex justify-between m-5">
                            <div class="flex">
                                <a href="{{ route('profile.show', ['user' => $post->user->id]) }}" class="flex">
                                <x-profile-picture :src="asset($post->user->profile->url)" />
                                </a>
                                <span class="font-bold">{{ $post->user->name }} <br> <span class="text-gray-500 font-normal text-sm">{{ $post->created_at->diffForHumans() }}</span></span>
                            </div>
                            @mine($post->user->id)                              
                            <div>
                                <a href="" class="bg-accent-500 text-white px-3 py-1 rounded">edit</a>
                            </div>
                            @endmine
                        </div>
                        <div class="">
                            <p class="ms-5 mb-5">{{ $post->text_content }}</p>
                            <div>
                                {{-- {{ $post?->media }} --}}
                                @isset($post->media->url)
                                    <img src="{{ asset($post->media?->url) }}" class="">
                                @endisset
                            </div>
                        </div>
                        <div class="border-t mt-3 mx-5"></div>
                        <div class="py-4 grid grid-cols-2">
                            <livewire:like-post :post="$post" />
                            <div class="flex justify-center text-gray-500">
                                <div class="flex flex-col justify-center">
                                    <x-icon name="comment" class="h-5 mr-2 fill-gray-500" />
                                </div>
                                Comment
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        {{-- <div class="w-2/6 p-5">
            <div class="grid gap-5">
                <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white rounded-xl">
                    <div class="p-5 text-lg">Contacts</div>
                    <div class="grid gap-2 h-[74vh] overflow-auto">
                        @foreach($people as $user)
                            <div class=" rounded-xl p-5 my-auto flex">
                                <img src="https://i.pravatar.cc/60?u={{ $user->id }}" width="60" height="60" alt="" class="mr-4 rounded-full">
                                <span class="pt-5">{{ $user->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</x-app-layout>
