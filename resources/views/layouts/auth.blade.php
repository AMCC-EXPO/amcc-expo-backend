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
                            <img src="{{ asset('user/img/amcc.png') }}" alt="" class="w-[32px] h-[32px] md:w-[61px] md:h-[61px]" />
                        </a>
                        <h1 class="font-medium text-[20px] md:text-[28px]">Amikom Computer Club</h1>
                    </header>
                    <div class="text-center m-12">
                        <h1 class="text-2xl md:text-[36px] font-medium">Pendaftaran Member AMCC 2022</h1>
                        <p class="mt-4 text-base mx-auto max-w-sm md:text-center">AMCC atau Amikom Computer Club
                            merupakan UKM di Universitas Amikom Yogyakarta. UKM yang berbasis keilmuan dan memiliki visi
                            menjadi “The Best IT Organization in Jogja”</p>
                    </div>

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
