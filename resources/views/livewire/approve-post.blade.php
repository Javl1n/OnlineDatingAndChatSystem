<div x-data="{approved: {{ $approved ? 'true' : 'false' }}}">
    <div x-show="!approved">
        <form wire:submit='approve' class="flex justify-center">
            <button class="flex text-gray-500" @click="approved =! approved">
                <div class="flex flex-col justify-center">
                    <x-icon name="check-circle" class="h-5 mr-2 fill-gray-500" />
                </div>
                Approve
            </button>
        </form>
    </div>
    <div x-show="approved">
        <div class="flex justify-center">
            <div class="group flex text-primary-500">
                <div class="flex flex-col justify-center">
                    <x-icon name="check-circle-fill" class="h-5 mr-2 fill-primary-500" />
                </div>
                <div class="">Approved</div>
            </div>
        </div>
    </div>
</div>

