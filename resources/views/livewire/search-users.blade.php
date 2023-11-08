<div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white block h-full pt-5 pl-5 flex flex-col">
    <div class="grid grid-cols-10 pr-5">
        <span class="my-auto col-span-1">Search</span>
        <form method="get" class="col-span-9">
            <x-text-input wire:model.live="search" class="w-full h-15 rounded-full text-lg"/>
        </form>
    </div>
    <div class="flex-1 overflow-x-auto mt-5">
        <div class="grid gap-1">
            <div class="text-center pt-5 text-lg font-bold" wire:loading>
                Searching users...
            </div>
            <div wire:loading.remove>
                @if($users->isEmpty())
                    <div class="text-center pt-5 text-lg font-bold">
                        No matching result was found.
                    </div>
                @else
                    @foreach ($users as $user)
                        <div class=" rounded-xl py-5 pr-5 my-auto flex">
                            <img src="https://i.pravatar.cc/60?u={{ $user->id }}" width="60" height="60" alt="" class="mr-4 rounded-full">
                            <span class="pt-5">{{ $user->name }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
