@props(['name'])

@switch($name)
    @case('plus-fill')
        <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes }} fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
        </svg>
        @break

    @default
        <span class="text-white p-5 bg-red-500">Icon not available</span>
@endswitch
