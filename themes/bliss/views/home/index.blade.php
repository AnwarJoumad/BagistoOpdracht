@php
    $channel = core()->getCurrentChannel();
@endphp


{{-- SEO Meta Content --}}
@push ('meta')
    <meta name="title" content="{{ $channel->home_seo['meta_title'] ?? '' }}" />

    <meta name="description" content="{{ $channel->home_seo['meta_description'] ?? '' }}" />

    <meta name="keywords" content="{{ $channel->home_seo['meta_keywords'] ?? '' }}" />
@endPush

<x-shop::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        {{  $channel->home_seo['meta_title'] ?? '' }}
    </x-slot>

    @foreach ($customizations as $customization)
        @php ($data = $customization->options)

        @switch ($customization->type)
            
        @case ($customization::STATIC_CONTENT)
            {{-- push style --}}
            @push ('styles')
                <style>
                    {{ $data['css'] }}
                </style>
            @endpush

            {{-- render html --}}
            {!! $data['html'] !!}

    @break
    @endswitch
    @endforeach

    <div style="display: flex; justify-content: center; margin-top: 20px">
        <h1>Anwar Joumad</h1>
    </div>

    <div style="display: flex; justify-content: center; margin-top: 20px">
        <h5>I am Anwar. I am 20 years old and I live in Breda. My hobbies are playing football and gaming.</h5>
    </div>


    <div style="display: flex; justify-content: space-around; margin: 20px;">

        <div style="border-width: 2px; border-color: #000000; ">
            <div style="display: flex; justify-content: center; margin-top: 20px">
                <h1>Games I play</h1>
            </div>

            <div style="display: flex; justify-content: center; margin: 20px">
                <img src="{{ Vite::asset('public/themes/bliss/build/assets/fortnite.png') }}" alt="fortnite" style="height: 300px; width: 200px; margin-right: 50px ">
                <img src="{{ Vite::asset('public/themes/bliss/build/assets/jw2.jpg') }}" alt="jurrasic world evolution 2" style="height: 300px; width: 200px">
            </div>
        </div>

        <div style="border-width: 2px; border-color: #000000; ">
            <div style="display: flex; justify-content: center; margin-top: 20px">
                <h1>My favourite football player and team</h1>
            </div>

            <div style="display: flex; justify-content: center; margin: 20px">
                <img src="{{ Vite::asset('public/themes/bliss/build/assets/juventus.png') }}" alt="fortnite" style="height: 250px; width: 200px; margin-right: 50px ">
                <img src="{{ Vite::asset('public/themes/bliss/build/assets/cristiano.jpg') }}" alt="jurrasic world evolution 2" style="height: 350px; width: 200px">
            </div>
        </div>

    </div>

    @foreach ($customizations as $customization)
        @php ($data = $customization->options)

        {{-- Static content --}}
        @switch ($customization->type)
            {{-- Image Carousel --}}
            @case ($customization::IMAGE_CAROUSEL)
                <x-shop::carousel :options="$data"></x-shop::carousel>

                @break



            @case ($customization::CATEGORY_CAROUSEL)
                {{-- Categories carousel --}}
                <x-shop::categories.carousel
                    :title="$data['title'] ?? ''"
                    :src="route('shop.api.categories.index', $data['filters'] ?? [])"
                    :navigation-link="route('shop.home.index')"
                >
                </x-shop::categories.carousel>

                @break

            @case ($customization::PRODUCT_CAROUSEL)
                {{-- Product Carousel --}}
                <x-shop::products.carousel
                    {{-- title="Men's Collections" --}}
                    :title="$data['title'] ?? ''"
                    :src="route('shop.api.products.index', $data['filters'] ?? [])"
                    :navigation-link="route('shop.home.index')"
                >
                </x-shop::products.carousel>
    @break
    @endswitch
    @endforeach

</x-shop::layouts>
