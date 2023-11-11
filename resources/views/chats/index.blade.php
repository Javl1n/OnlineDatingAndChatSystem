<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chats') }}
        </h2>
    </x-slot>

    <div class="flex justify-center h-[85vh]">
        <div class="md:w-2/6 w-full h-full overflow-y-hidden">
            <livewire:search-users />
        </div>
        <div class="md:flex flex-col justify-center w-4/6 flex-shrink-0 text-slate-800 dark:text-white overflow-y-auto lg:h-[10vh] xl:h-[85vh] border hidden ">
            <div class="text-xl text-center">Please select a user</div>
        </div>
    </div>
</x-app-layout>
