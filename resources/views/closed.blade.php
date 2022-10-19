<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.partials.head')

    @section('title', 'Pendaftaran Ditutup')
</head>

<body>
    <header class="flex p-5 md:px-20 md:py-10 justify-between items-center bg-primary-color">
        <div class="flex items-center space-x-2 md:space-x-5">
            <a>
                <img src="{{ asset('img/amcc-putih.svg') }}" alt=""
                    class="w-[32px] h-[32px] md:w-[61px] md:h-[61px]" />
            </a>
            <h1 class="md:text-2xl md:text-[28px] text-white font-bold">Amikom Computer Club</h1>
        </div>
        <a href="{{ route('login') }}" type="button"
            class="text-black bg-white focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-2 py-1 md:px-5 md:py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 -ml-1 w-2 h-2 md:w-4 md:h-4" viewBox="0 0 448 512">
                <path
                    d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
            </svg>
            Login
        </a>
    </header>
    <main>
        <section id="hero">
            <div class="flex w-full bg-primary-color">
                <div class="h-screen mx-auto space-y-3 mt-10 md:mt-0">
                    <div class="flex flex col justify-center items-center space-x-2">
                        <h1 class="text-2xl md:text-4xl text-center font font-medium text-white">
                            Maaf, Pendaftaran ditutup
                        </h1>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-xl md:text-2xl text-center text-white px-10">
                        @if ($inPeriod == true && $inOperational == false)
                            Silahkan mendaftar pada jam operasional EXPO
                        @else
                            Sampai jumpa di EXPO 2023!
                        @endif
                    </h1>
                    <img src="{{ asset('img/close.png') }}" class="w-full p-5" alt="" />
                </div>
            </div>
        </section>
    </main>
</body>

</html>
