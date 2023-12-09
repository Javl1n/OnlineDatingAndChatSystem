<div class="">
    <form wire:submit="send">
        <div class="px-5">
            @foreach ($post->comments()->latest()->get() as $comment)
                <div class="flex gap-2 mt-2">
                    <x-profile-picture class=""  :src="asset(auth()->user()->profile->url)" />
                    <div class="rounded-xl bg-gray-200 p-2">
                        <div class="font-bold">{{ $comment->user->name }}</div>
                        {{ $comment->content }}
                    </div>
                </div>
            @endforeach
        </div>
        <div wire:loading.remove class="flex px-5 py-2 mt-2">
            <div class="flex flex-col justify-center">
                <x-profile-picture class="h-9 w-9"  :src="asset(auth()->user()->profile->url)" />
            </div>
            <textarea
            type="text"
            name="content"
            wire:model="content"
            class="h-[40px] resize-none flex-1 mr-2 pt-2 rounded-[25px] border-none bg-gray-200"
            x-data="{ resize: () => { $el.style.height = '40px'; $el.style.height = $el.scrollHeight + 'px'; } }"
            x-init="resize()"
            placeholder="Post a comment..."
            @input="resize()"
            required
            ></textarea>
            <button >
                <x-icon name="send-fill" height="30" width="30" class="mr-2 fill-primary-500 h-10 rotate-45" />
            </button>
        </div>
        
    </form>
</div>