<div class="flex-1 flex flex-col-reverse py-4 px-5 overflow-auto" wire:poll>
    @foreach ($messages as $message)
        @switch($message->receiver_id)
            @case($user->id)
                <div class="grid mb-4">
                    <div class="justify-self-start flex">
                        <div class="grid flex-shrink-0"><img src="https://i.pravatar.cc/50?u={{ $receiver->id }}" width="50" height="50" alt="" class="mr-4 rounded-full align-end"></div>
                        <div class=" rounded-xl bg-white pt-3 pb-4 px-5 max-w-md  md:break-words break-all">
                            <div>{{ $message->content }}</div>
                            @isset($message->media->url)
                                <img src="{{ asset($message->media?->url) }}" alt="wala kay picture" class="mt-2 max-w-xl">
                            @endisset    
                        </div>
                    </div>
                </div>
                @break
            @case($receiver->id)
                <div class="grid mb-4">
                    <div class="justify-self-end flex">
                        <div class=" rounded-xl bg-pink-500 text-white pt-3 pb-4 px-5 flex-1 md:break-words break-all">
                            <div>{{ $message->content }}</div>
                            @isset($message->media->url)
                                <img src="{{ asset($message->media?->url) }}" alt="wala kay picture" class="mt-2 max-w-xl">
                            @endisset
                        </div>
                        <div class="grid flex-shrink-0"><img src="https://i.pravatar.cc/50?u={{ $user->id }}" width="50" height="50" alt="" class="ml-4 rounded-full align-end"></div>
                    </div>
                </div>
                @break
            @default
        @endswitch
    @endforeach
</div>