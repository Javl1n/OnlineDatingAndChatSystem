<div class="flex-1 flex flex-col-reverse py-4 px-5 overflow-auto" wire:poll>
    @foreach ($messages as $message)
        @switch($message->receiver_id)
            @case($user->id)
                <div class="mb-4">
                    <div class="flex gap-2 group">
                        <div class="flex-shrink-0">
                            <x-profile-picture :src="asset($receiver->profile->url)" class="mr-0 rounded-full" />
                        </div>
                        <div class=" rounded-xl bg-white pt-3 pb-4 px-5 max-w-md  md:break-words break-all">
                            <div>{{ $message->content }}</div>
                            @php
                                $media = $message->media;
                            @endphp
                            @isset($media)
                                @if (in_array($media->mime_type, ['jpg', 'jpeg', 'png']))
                                    <img src="{{ asset($media->url) }}" class="mt-2">
                                @endif
                                @if($media->mime_type === 'mp4')
                                    <video class="block ml-auto mr-auto" controls>
                                        <source src="{{ asset($media->url) }}" type='video/mp4' >
                                    </video>
                                @endif
                            @endisset  
                        </div>
                        <div class="relative group-hover:block hidden" x-data='{report: false}'>
                            @isset($message->report->description)
                                <div class="text-xs text-primary-500">
                                    reported
                                </div>
                            @else
                                <x-icon @click="report =! report" name="warning-circle" class="w-6 h-6 mt-4 fill-primary-500" />
                                <div @click.outside='report = false' class="absolute mt-2" x-show="report">
                                    <form action="{{ route('reports.store', ['message' => $message]) }}" method="post">
                                        @csrf
                                        <div class="bg-white p-2 rounded-xl flex gap-2">
                                            <input type="text" name="content" class="rounded-xl border" required placeholder="Send report">
                                            <button type="submit" class="bg-red-500 px-2 rounded-xl text-white">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
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
                            @php
                                $media = $message->media;
                            @endphp
                            @isset($media)
                                @if (in_array($media->mime_type, ['jpg', 'jpeg', 'png']))
                                    <img src="{{ asset($media->url) }}" class="mt-2 max-w-xl">
                                @endif
                                @if($media->mime_type === 'mp4')
                                    <video class="block ml-auto mr-auto mt-2 max-w-xl" controls>
                                        <source src="{{ asset($media->url) }}" type='video/mp4' >
                                    </video>
                                @endif
                            @endisset
                            {{-- @isset($message->media->url)
                                <img src="{{ asset($message->media?->url) }}" alt="wala kay picture" class="mt-2 max-w-xl">
                            @endisset --}}
                        </div>
                        <div class="grid flex-shrink-0">
                            <x-profile-picture :src="asset($user->profile->url)" class="ml-4 rounded-full align-end" />
                            {{-- <img src="https://i.pravatar.cc/50?u={{ $user->id }}" width="50" height="50" alt="" class="ml-4 rounded-full align-end"> --}}
                        </div>
                    </div>
                </div>
                @break
            @default
        @endswitch
    @endforeach
</div>