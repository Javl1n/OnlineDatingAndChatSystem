<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center px-40">
        <div class="w-3/4 text-white bg-background-500 p-5 overflow-y-scroll h-[82vh]">
            
                @for ($i = 0; $i<=10; $i++)
                    1
                    <div class="bg-slate-900 h-20 rounded-xl p-5">
                        asdsad
                    </div>
                @endfor
        </div>
        <div class="w-1/4 p-5">
            HELO
        </div>
    </div>
</x-app-layout>
