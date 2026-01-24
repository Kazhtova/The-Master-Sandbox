@props(['active' => false])

<a {{ $attributes->merge(['class' => $active ? 'text-purple-500 font-black text-lg' : '']) }}>{{ $slot }}</a>
