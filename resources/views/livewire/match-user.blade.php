<div x-data="{matched: {{ $matched ? 'true' : 'false' }}}">
    <div x-show="!matched">
        <form wire:submit='match'>
            <button @click="matched =! matched" class="py-2 w-24 bg-primary-600 text-white rounded-xl" href="">match</button>
        </form>
    </div>
    <div x-show="matched">
        <form wire:submit='unmatch'>
            <button @click="matched =! matched" class="py-2 w-24 text-center bg-primary-200 text-white rounded-xl" href="">unmatch</button>
        </form>
    </div>
</div>
