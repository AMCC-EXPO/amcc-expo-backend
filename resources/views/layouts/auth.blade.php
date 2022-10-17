<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.head')

</head>

<body class="font-inter">
    <main class="relative">
        <section id="hero-left ">
            <div class="flex flex-col-reverse md:space-y-0 md:flex-row">

                @include('layouts.partials.carousel')

                <div class="md:h-full md:w-[40%]"></div>
                <div class="md:w-[60%]">

                    <header class="flex flex-col bg-white p-5 items-center space-x-5 justify-center mx-auto">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('user/img/amcc.png') }}" alt=""
                                class="w-[32px] h-[32px] md:w-[61px] md:h-[61px]" />
                        </a>
                        <h1 class="font-medium text-[20px] md:text-[28px]">Amikom Computer Club</h1>
                    </header>
                    <div class="text-center m-12">
                        <h1 class="text-2xl md:text-[36px] font-medium">Pendaftaran Member AMCC 2022</h1>
                        <p class="mt-4 text-base mx-auto max-w-sm md:text-center">AMCC atau Amikom Computer Club
                            merupakan UKM di Universitas Amikom Yogyakarta. UKM yang berbasis keilmuan dan memiliki visi
                            menjadi “The Best IT Organization in Jogja”</p>
                    </div>

                    @if (\App\Models\Setting::first()->announcement != null)
                        <div class="alert flex items-center justify-between p-4 mb-6 text-sm text-yellow-600 bg-yellow-100 rounded-lg"
                            role="alert" style="margin-left: 20%; margin-right: 20%;">
                            <span class="font medium">
                                {{ \App\Models\Setting::first()->announcement }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="close flex-shrink-0 inline w-3 h-3 mr-3 cursor-pointer" viewBox="0 0 384 512">
                                <path
                                    d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                            </svg>
                        </div>
                    @endif

                    <div class="container mx-auto px-[50px] md:px-[170px] flex flex-col">
                        @yield('content')
                    </div>

                    @include('layouts.partials.faq')

                </div>
            </div>
        </section>

        @include('layouts.partials.floating-wa')

    </main>

    @include('layouts.partials.footer-script')

</body>

</html>
