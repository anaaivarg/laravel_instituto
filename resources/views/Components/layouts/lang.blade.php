<x-dropdown>

    <x-slot name="trigger">
        Selecciona un idioma
    </x-slot>

    <x-slot name="content">
        <ul class="text-black">
            @foreach(config("language") as $code => $data)
                <li>
                    <a href="{{ route('change_lang', $code) }}">
                        {{ $data['name'] }}
                        {{ $data['flag'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </x-slot>

</x-dropdown>
