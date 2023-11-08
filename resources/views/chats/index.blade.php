<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chats') }}
        </h2>
    </x-slot>

    <div class="flex justify-center h-[85vh]">
        <div class="w-2/6 h-full overflow-y-hidden">
            {{-- <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white block h-[85vh] pt-5 px-5 flex flex-col">
                    <div class="grid grid-cols-10">
                        <span class="my-auto col-span-1">Search</span>
                        <x-text-input class="w-full h-15 rounded-full text-lg col-span-9"/>
                    </div>
                    <div class="flex-1 bg-primary-600 overflow-x-auto mt-5">
                        <div class="grid gap-1">
                            @foreach($people as $user)
                                <div class=" rounded-xl p-5 my-auto flex">
                                    <img src="https://i.pravatar.cc/60?u={{ $user->id }}" width="60" height="60" alt="" class="mr-4 rounded-full">
                                    <span class="pt-5">{{ $user->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div> --}}
            <livewire:search-users />
        </div>
        <div class="flex flex-col w-4/6 flex-shrink-0 text-slate-800 dark:text-white overflow-y-auto lg:h-[10vh] xl:h-[85vh]">
            <div class="flex-1 bg-primary-600">
                sa
            </div>
            <div class="bg-primary-200 p-4 flex">
                <x-icon name="plus-fill" height="30" width="30" class="mr-2" />
                <x-icon name="plus-fill" height="30" width="30" class="mr-2" />
                <x-icon name="plus-fill" height="30" width="30" class="mr-2" />
                <x-icon name="plus-fill" height="30" width="30" class="mr-2" />
            </div>
        </div>
    </div>
</x-app-layout>
