@props(['items' => []])

<nav>
    <ul>
        @foreach ($items as $item)
            <li>
                {{-- <a href="{{ $item['url'] }}">{{ $item['name'] }}</a> --}}

                <x-nav-link class="" :href="$item['url']">
                    {{ $item['name'] }}
                </x-nav-link>
            </li>
        @endforeach
    </ul>
</nav>
