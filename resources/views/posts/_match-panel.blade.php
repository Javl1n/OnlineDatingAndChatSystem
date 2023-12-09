<div class="grid gap-5">
    <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white rounded-xl">
        <div class="p-5 text-lg font-bold">Match with people:</div>
       
            <div class="gap-2 h-[74vh] overflow-auto">
                @verified
                    @foreach($people as $user)
                        @php
                            $tags = auth()->user()->tags()->whereIn('tag_id', $user->tags->pluck('id'))->get()
                        @endphp
                        <div class="rounded-xl px-5 my-auto flex w-full justify-between">
                            <a href="{{ route('profile.show', ['user' => $user->id]) }}" class="flex">
                                <x-profile-picture :src="$user->profile->url" />
                                <div class="flex flex-col justify-center">
                                    <span class="font-bold">{{ $user->name }}</span><br>
                                    <span class="text-sm text-gray-400">you both like: 
                                        @foreach ($tags as $tag)
                                            <span class="underline font-bold">{{ $tag->name }}</span>@if($loop->last) @break @endif, 
                                        @endforeach
                                    </span>
                                </div>
                            </a>
                            <div class="flex flex-col justify-center">
                                <livewire:match-user :user="$user" />
                            </div>
                        </div>
                    @endforeach
                @else
                    get verified first to meet other people
                
                @endverified
            </div>
    </div>
</div>