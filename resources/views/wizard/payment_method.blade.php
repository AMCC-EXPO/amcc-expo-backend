@extends('layouts.app')

@section('title', 'Metode Pembayaran')

@section('content')

    @include('layouts.partials.timeline')

    <section id="input-data">
        <div class="flex flex-col-reverse md:space-y-0 md:flex-row md:px-10">
            <div
                class="flex flex-col justify-center items-center md:items-stretch bg-white md:w-full drop-shadow-md p-20 rounded-xl">
                <form enctype="multipart/form-data" method="POST" action="{{ route('wizard.update-payment-method') }}">
                    @csrf

                    <ul class="grid gap-6 w-full md:grid-cols-2">
                        @foreach ($paymentMethods as $paymentMethod)
                            <li>
                                <input type="radio" id="paymentMethod{{ $paymentMethod->id }}" name="paymentMethod"
                                    value="{{ $paymentMethod->id }}" class="hidden peer" required {{ ($user->payment->payment_method_id == $paymentMethod->id) ? 'checked' : ''}}/>
                                <label for="paymentMethod{{ $paymentMethod->id }}"
                                    class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer peer-checked:border-primary-color peer-checked:text-primary-color hover:text-gray-600 hover:bg-gray-100">
                                    <div class="flex items-center space-x-5">
                                        <div class="text-lg font-semibold w-[60px] md:w-[60px]">
                                            <img src="{{ $paymentMethod->getFirstMediaUrl('payment-icon', 'thumb') }}">
                                        </div>
                                        <div class="flex flex-col justify-end items-center md:flex-row md:space-x-3">
                                            <div class="w-full md:text-2xl font-bold text-black">
                                                {{ $paymentMethod->name }}
                                            </div>
                                            @if ($paymentMethod->is_ots == true)
                                                <span
                                                    class="bg-[#D6DA07] text-black text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-xl dark:bg-blue-200 dark:text-blue-800">
                                                    OTS
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 w-7 h-7 md:w-10 md:h-10"
                                        fill="currentColor" viewBox="0 0 512 512">
                                        <path
                                            d="M160 256C160 202.1 202.1 160 256 160C309 160 352 202.1 352 256C352 309 309 352 256 352C202.1 352 160 309 160 256zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z" />
                                    </svg>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <div class="flex flex-col space-y-3 md:space-y-0 md:flex-row md:justify-between mt-10">
                        <a href="{{ route('wizard.profile') }}"
                            class="text-white bg-primary-color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 md:w-[222px] font-medium rounded-lg text-sm md:text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                        <button type="submit"
                            class="text-white bg-primary-color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 md:w-[222px] font-medium rounded-lg text-sm md:text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
