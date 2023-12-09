<div x-data="{like: {{ $liked ? 'true' : 'false' }}}">
    <div x-show="!like">
        <form wire:submit='like' class="flex justify-center">
            {{-- <input type="hidden" wire:model='post_id' value="{{ $post->id }}"> --}}
            <button class="flex text-gray-500" @click="like =! like">
                <div class="flex flex-col justify-center">
                    <x-icon name="like" class="h-5 mr-2 fill-gray-500" />
                </div>
                {{ $display }}
            </button>
        </form>
    </div>
    <div x-show="like">
        <form wire:submit='unlike' class="flex justify-center">
            {{-- <input type="hidden" wire:model='post_id' value="{{ $post->id }}"> --}}
            <button class="flex text-primary-500" @click="like =! like">
                <div class="flex flex-col justify-center">
                    <x-icon name="like" class="h-5 mr-2 fill-primary-500" />
                </div>
                {{ $display }}
            </button>
        </form>
    </div>
</div>
