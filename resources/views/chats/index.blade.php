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
        <div class="flex flex-col w-4/6 flex-shrink-0 text-slate-800 dark:text-white overflow-y-auto lg:h-[10vh] xl:h-[85vh] border">
            <div class="h-24 flex bg-white p-5">
                <img src="https://i.pravatar.cc/60" width="60" height="60" alt="" class="mr-4 rounded-full">
                <div class="flex flex-col justify-center">
                    <span class="font-bold m-0">ME na too</span>
                    <small class="text-gray-500 m-0">online</small>
                </div>
            </div>
            <div class="flex-1 flex flex-col my-4 mx-5">
                <div class="grid mb-4">
                    <div class="justify-self-start flex">
                        <div class="grid"><img src="https://i.pravatar.cc/50" width="50" height="50" alt="" class="mr-4 rounded-full align-end"></div>
                            <div class=" rounded-xl bg-white pt-3 px-5">sladjlasjk</div>
                    </div>
                </div>
                <div class="grid mb-4">
                    <div class="justify-self-end flex">
                        <div class=" rounded-xl bg-white pt-3 px-5">sladjlasjk</div>
                        <div class="grid"><img src="https://i.pravatar.cc/50" width="50" height="50" alt="" class="ml-4 rounded-full align-end"></div>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow dark:bg-transparent dark:shadow-indigo-400 p-4 flex content-end">
                <x-icon name="plus-fill" height="30" width="30" class="mr-2 my-auto fill-indigo-400" />
                <x-icon name="plus-fill" height="30" width="30" class="mr-2 my-auto fill-indigo-400" />
                <x-icon name="plus-fill" height="30" width="30" class="mr-2 my-auto fill-indigo-400" />
                <textarea
                    type="text"
                    class="h-[30px] resize-none flex-1 mr-2 pt-2 rounded-[25px] border border-indigo-400 dark:bg-inherit"
                    x-data="{ resize: () => { $el.style.height = '30px'; $el.style.height = $el.scrollHeight + 'px'; } }"
                    x-init="resize()"
                    @input="resize()"
                    ></textarea>
                    <x-icon name="plus-fill" height="30" width="30" class="mr-2 fill-indigo-400 h-10" />
            </div>
        </div>
    </div>
</x-app-layout>
