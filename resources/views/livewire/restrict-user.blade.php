<div x-data="{restrict: {{ $restricted ? 'true' : 'false' }}}">
    <div x-show="!restrict">
        <form wire:submit='restrict' class="flex justify-center">
            <button class="flex text-gray-500" @click="restrict =! restrict">
                <div class="flex flex-col justify-center">
                    <x-icon name="x-circle" class="h-5 mr-2 fill-gray-500" />
                </div>
                Restrict
            </button>
        </form>
    </div>
    <div x-show="restrict">
        <form wire:submit='unrestrict' class="flex justify-center">
            <button class="group flex text-primary-500" @click="restrict =! restrict">
                <div class="flex flex-col justify-center">
                    <x-icon name="x-circle-fill" class="h-5 mr-2 fill-primary-500" />
                </div>
                <div class="group-hover:hidden">Restricted</div>
                <div class="hidden group-hover:block">Unrestrict</div>
            </button>
        </form>
    </div>
</div>

