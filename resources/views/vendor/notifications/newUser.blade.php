@component('mail::message')
    {{-- Greeting --}}
    @if (! empty($greeting))
        # {{ $greeting }}
    @else
        @if ($level == 'error')
            # Уупс!
        @else
            # Здравей
        @endif
    @endif

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        {{ $line }}

    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
        <?php
        switch ($level) {
            case 'success':
                $color = 'green';
                break;
            case 'error':
                $color = 'red';
                break;
            default:
                $color = 'blue';
        }
        ?>
        @component('mail::button', ['url' => $actionUrl, 'color' => $color])
            {{ $actionText }}
        @endcomponent
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        {{ $line }}

    @endforeach

    {{-- Salutation --}}
    @if (! empty($salutation))
        {{ $salutation }}
    @else
        С уважние,<br>{{ config('app.name') }}
    @endif

    {{-- Subcopy --}}
    @isset($actionText)
        @component('mail::subcopy')Стая БГ е български сайт,който има за цел да предостави безплатни и платени услуги
            в сферата на недвижимото имущество и споделените квартири на територията на република България.
            Всички обяви в сайта са под строг контрол и са интелектуално право на ВЕГА ДМ ООД.
        @endcomponent
    @endisset
@endcomponent
