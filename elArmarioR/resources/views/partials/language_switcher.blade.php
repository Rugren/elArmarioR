{{-- Esto creado nuevo 
    TUTORIAL COMPLETO: 
    https://lokalise.com/blog/laravel-localization-step-by-step/
    https://github.com/lokalise/lokalise-tutorials/tree/main/laravel-i18n
--}}

<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    <h4 style="color: green">{{__('Language')}}: </h4>
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            {{-- <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span> --}}
            {{-- Que si marca un idioma nos coja ese, o sino que nos coja el del otro else, según el idioma  --}}
            {{-- Si $available_locale elegida es en(saldrá la bandera de inglaterra) 
                Si escoge por otra lado la otra, es(saldrá el español) 
                Está en: app.php en: 'available_locales', el en y el es--}}

        {{-- IDIOMA: English --}}
        {{-- <h6>{{__('English')}}</h6> --}}
            {{-- <img src="{{ asset('public/img/language/' . $available_locale . '.jpg') }}" class="img-fluid rounded" style="width: 2vw"> --}}
            {{__('English')}}<img src="{{ asset('/img/' . $available_locale . '.png') }}" class="img-fluid rounded" style="width: 3vw">{{__('Spanish')}}
        {{-- IDIOMA: Spanish --}}
        {{-- <h6>{{__('Spanish')}}</h6> --}}
        
        @else

        {{-- Como solo tenemos español, elegiría esta opción contraria al inglés --}}
            <a class="ml-1 underline ml-2 mr-2" href="language/{{ $available_locale }}">
                {{-- <span>{{ $locale_name }}</span> --}}
                {{-- <img src="{{ asset('public/img/language/' . $available_locale . '.jpg') }}" class="img-fluid rounded" style="width: 2vw"> --}}
                {{-- <img src="{{ asset('/storage/app/public/' . '$available_locale' . '.jpg') }}" class="img-fluid rounded" style="width: 2vw"> --}}
                <img src="{{ asset('/img/' . $available_locale . '.png') }}" class="img-fluid rounded" style="width: 3vw">
            </a>
        @endif
    @endforeach
</div>