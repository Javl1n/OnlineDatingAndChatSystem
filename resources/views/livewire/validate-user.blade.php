<div x-data="{like: {{ $verified ? 'true' : 'false' }}}">
    <div x-show="!like">
        <form wire:submit='verify' class="flex justify-center">
            {{-- <input type="hidden" wire:model='post_id' value="{{ $post->id }}"> --}}
            <button class="flex text-gray-500" @click="like =! like">
                <div class="flex flex-col justify-center">
                    <x-icon name="verified" class="h-5 mr-2 fill-gray-500" />
                </div>
                Verify
            </button>
        </form>
    </div>
    <div x-show="like">
        <form wire:submit='unverify' class="flex justify-center">
            {{-- <input type="hidden" wire:model='post_id' value="{{ $post->id }}"> --}}
            <button class="group flex text-primary-500" @click="like =! like">
                <div class="flex flex-col justify-center">
                    <x-icon name="verified-fill" class="h-5 mr-2 fill-primary-500" />
                </div>
                <div class="group-hover:hidden">Verified</div>
                <div class="hidden group-hover:block">Unverify</div>
            </button>
        </form>
    </div>
</div>

