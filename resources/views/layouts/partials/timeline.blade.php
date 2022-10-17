<section id="title-header">
    <div class="text-center m-12">
        <h1 class="text-2xl md:text-[36px] font-medium">Selesaikan Pendaftaran</h1>
        <p class="mt-4 text-base mx-auto max-w-sm md:text-center">Jadi bagian dari AMCC sekarang</p>
    </div>
</section>

<section id="timeline-step">
    <div class="flex flex-col justify-center mx-auto mb-20">
        <div class="flex items-center justify-center">

            <div class="w-8/12 bg-primary-color h-2 dark:bg-gray-700"></div>
            <div class="flex items-center">
                <div
                    class="flex z-10 justify-center items-center rounded-full ring-0 dark:bg-blue-900 dark:ring-gray-900 shrink-0">
                    <div class="relative">
                        <a href="{{ route('wizard.profile') }}">
                            <img class="md:w-[60px] w-[45px]" src="{{ asset('img/data-diri.svg') }}" alt="" />
                            <h3
                                class="absolute md:-bottom-10 md:w-60 text-center md:-left-[90px] -left-1 font-semibold md:text-xl text-sm">
                                Data Diri</h3>
                        </a>
                    </div>
                </div>
            </div>

            @if (!Request::is('wizard/profile'))
                <div class="w-full bg-primary-color h-2 dark:bg-gray-700"></div>
            @else
                <div class="w-full bg-gray-300 h-2 dark:bg-gray-700"></div>
            @endif

            <div class="flex items-center">
                <div
                    class="flex z-10 justify-center items-center rounded-full ring-0 dark:bg-blue-900 dark:ring-gray-900 shrink-0">
                    <div class="relative">
                        <a href="{{ route('wizard.payment-method') }}">
                            <img class="md:w-[60px] w-[45px]"
                                src="{{ !Request::is('wizard/profile') ? asset('img/payment-method-active.svg') : asset('img/payment-method-disabled.svg') }}"
                                alt="" />
                            <h3
                                class="absolute md:-bottom-10 md:w-60 text-center md:-left-[85px] -left-[17px] font-semibold md:text-xl text-sm">
                                Metode Pembayaran</h3>
                        </a>
                    </div>
                </div>
            </div>

            @if (!Request::is('wizard/profile') && !Request::is('wizard/payment-method'))
                <div class="w-full bg-primary-color h-2 dark:bg-gray-700"></div>
            @else
                <div class="w-full bg-gray-300 h-2 dark:bg-gray-700"></div>
            @endif

            <div class="flex items-center">
                <div
                    class="flex z-10 justify-center items-center rounded-full ring-0 dark:bg-blue-900 dark:ring-gray-900 shrink-0">
                    <div class="relative">
                        <a href="{{ route('wizard.payment-confirm') }}">
                            <img class="md:w-[60px] w-[45px]" src="{{ !Request::is('wizard/profile') && !Request::is('wizard/payment-method') ? asset('img/payment-confirm-active.svg') : asset('img/payment-confirm-disabled.svg') }}"
                                alt="" />
                            <h3
                                class="absolute md:-bottom-10 md:w-60 text-center md:-left-[85px] -left-[17px] font-semibold md:text-xl text-sm">
                                Konfirmasi Pembayaran</h3>
                        </a>
                    </div>
                </div>
            </div>

            @if (Request::is('wizard/summary'))
                <div class="w-full bg-primary-color h-2 dark:bg-gray-700"></div>
            @else
                <div class="w-full bg-gray-300 h-2 dark:bg-gray-700"></div>
            @endif

        </div>
    </div>
</section>
