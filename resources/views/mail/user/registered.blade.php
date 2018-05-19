@component('mail::message')

    {{$greeting}}

{{-- Intro Lines --}}
@foreach ($introLines as $line)
    {{ $line }}

@endforeach

 @isset($actionText)
@component('mail::button', ['url' => $actionUrl,'color' => 'green'])
    {{ $actionText }}
@endcomponent
@endisset

С уважение,<br>
{{ config('app.name') }}

 @component('mail::subcopy')Стая БГ е български сайт,който има за цел да предостави безплатни и платени услуги
 в сферата на недвижимото имущество и споделените квартири на територията на република България.
 Всички обяви в сайта са под строг контрол и са интелектуално право на ВЕГА ДМ ООД.
 @endcomponent
@endcomponent
