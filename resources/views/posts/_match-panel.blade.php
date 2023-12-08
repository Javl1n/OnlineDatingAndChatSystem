<div class="w-2/6 p-5 me-5">
     <div class="grid gap-5">
         <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white rounded-xl">
             <div class="p-5 text-lg font-bold">Match and Chat with people:</div>
             <div class="gap-2 h-[74vh] overflow-auto">
                 @foreach($people as $user)
                    @php
                        $tags = auth()->user()->tags()->whereIn('tag_id', $user->tags->pluck('id'))->get()
                    @endphp
                    <div class=" rounded-xl p-5 my-auto flex w-full justify-between">
                            <div class="flex">
                                <x-profile-picture :src="$user->profile->url" />
                                <div class="flex flex-col justify-center">
                                    <span class="font-bold">{{ $user->name }}</span><br>
                                    <span class="text-sm text-gray-400">you both like: 
                                        
                                        @foreach ($tags as $tag)
                                            <span class="underline font-bold">{{ $tag->name }}</span>@if($loop->last) @break @endif, 
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center">
                                <a class="py-2 px-4 bg-primary-600 text-white rounded-xl" href="">match</a>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>