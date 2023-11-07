<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-2/6 p-5">
            <div class="grid gap-5">
                <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white rounded-xl">
                    <div class="p-5 text-lg font-bold">People You May Know:</div>
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
        </div>
        <div class="grid gap-5 w-3/6 flex-shrink-0 text-slate-800 dark:text-white p-5 overflow-y-scroll lg:h-[10vh] xl:h-[85vh]">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-sm dark:bg-slate-700 rounded-xl p-5">
                        <div class="flex mb-5">
                            <img src="https://i.pravatar.cc/60?u={{ $post->user->id }}" width="50" height="50" alt="" class="mr-4 rounded-full">
                            <span class="pt-3 font-bold">{{ $user->name }}</span>
                        </div>
                        <div class="">
                            {{ $post->text_content }}
                        </div>
                    </div>
                @endforeach
        </div>
        <div class="w-2/6 p-5">
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
        </div>
    </div>
</x-app-layout>
