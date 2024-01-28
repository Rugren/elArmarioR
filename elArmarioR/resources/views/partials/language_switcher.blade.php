{{-- Esto creado nuevo 
    TUTORIAL COMPLETO: 
    https://lokalise.com/blog/laravel-localization-step-by-step/
    https://github.com/lokalise/lokalise-tutorials/tree/main/laravel-i18n
--}}

<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            {{-- <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span> --}}
            {{-- Que si marca un idioma nos coja ese, o sino que nos coja el del otro else, según el idioma  --}}
            {{-- Si $available_locale elegida es en(saldrá la bandera de inglaterra) 
                Si escoge por otra lado la otra, es(saldrá el español) 
                Está en: app.php en: 'available_locales'--}}
            <img src="{{ asset('public/img/' . $available_locale . '.jpg') }}" class="img-fluid rounded" style="width: 2vw">
            
        @else
            <a class="ml-1 underline ml-2 mr-2" href="language/{{ $available_locale }}">
                {{-- <span>{{ $locale_name }}</span> --}}
                <img src="{{ asset('public/img/' . $available_locale . '.jpg') }}" class="img-fluid rounded" style="width: 2vw">
            </a>
        @endif
    @endforeach
</div>