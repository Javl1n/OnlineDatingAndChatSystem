<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chats') }}
        </h2>
    </x-slot>

    <div class="flex justify-center h-[85vh]">
        <div class="w-2/6 h-full overflow-y-hidden md:block hidden">
            <livewire:search-users />
        </div>    
        <div class="flex flex-col md:w-4/6 w-full flex-shrink-0 text-slate-800 dark:text-white overflow-y-auto lg:h-[10vh] xl:h-[85vh] border dark:border-none">
            <div class="h-24 flex bg-white dark:bg-slate-800 p-5">
                <img src="https://i.pravatar.cc/60?u={{ $receiver->id }}" width="50" height="60" alt="" class="mr-4 rounded-full">
                <div class="flex-1 flex flex-col justify-center">
                    <span class="font-bold m-0">{{ $receiver->name }}</span> 
                    <small class="text-gray-500 m-0">online</small>
                </div>
                <a href="/chat" class="flex flex-col justify-center h-10 my-auto w-24 rounded-full text-white bg-red-500 md:hidden"><div class="text-center">Go back</div></a>
            </div>
            <livewire:chat-box :receiver="$receiver" />
            <form action="/chat/{{ $receiver->id }}" method="post">
                @csrf
                <div class="bg-white shadow dark:bg-transparent dark:shadow-indigo-400 p-4 flex content-end">
                    <textarea
                        type="text"
                        name="message"
                        class="h-[30px] resize-none flex-1 mr-2 pt-2 rounded-[25px] border border-indigo-400 dark:bg-inherit"
                        x-data="{ resize: () => { $el.style.height = '30px'; $el.style.height = $el.scrollHeight + 'px'; } }"
                        x-init="resize()"
                        @input="resize()"
                        required
                        ></textarea>
                        <button>
                            <x-icon name="send-fill" height="30" width="30" class="mr-2 fill-indigo-400 h-10 rotate-45" />
                        </button>
                </div>
            </form>
        </div>
        
    </div>
</x-app-layout>
