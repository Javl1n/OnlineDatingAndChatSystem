<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chats') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-2/6 mt-1">
            <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white block h-[85vh]">
                dasd
            </div>
        </div>
        <div class="grid gap-5 w-3/6 flex-shrink-0 text-slate-800 dark:text-white p-5 overflow-y-scroll lg:h-[10vh] xl:h-[85vh]">
        </div>
        <div class="w-2/6 p-5">
            <div class="grid gap-5">
                <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white rounded-xl">
                    <div class="p-5 text-lg">Contacts</div>
                    <div class="grid gap-2 h-[74vh] overflow-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
