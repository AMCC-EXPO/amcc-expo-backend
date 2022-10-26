@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran')

@section('content')

    @include('layouts.partials.timeline')

    <section id="input-data">
        <div class="flex flex-col-reverse md:space-y-0 md:flex-row md:px-10">
            <div class="flex flex-col bg-white drop-shadow-md md:w-full p-20 rounded-xl">

                @if ($paymentState == true)

                    <div class="mb-5 space-y-3">
                        <h1 class="text-lg md:text-2xl font-bold">Konfirmasi Pembayaran</h1>
                        @if ($paymentMethod->is_ots == true)
                            <h1 class="text-sm md:text-lg">Silahkan Mendatangi Stand EXPO AMCC</h1>
                        @else
                            <h1 class="text-sm md:text-lg">Mohon transfer ke rekening dibawah, sertakan NIM lengkap kamu
                                tanpa
                                titik (contoh: 22119999) di Nomor Referensi nya saat transfer.</h1>
                            <h1 class="text-sm md:text-lg">Maksimal pembayaran pada
                                <b>{{ $paymentDue }}</b>
                                {{-- <b>{{ Auth::user()->payment->payment_due }}</b> --}}
                                {{-- {{ date_format(Auth::user()->payment->payment_due, 'd/m/Y H:i:s') }} --}}
                                {{-- {{ DateTime::createFromFormat('Y-m-d H:i:s', Auth::user()->payment->payment_due); }} --}}
                            </h1>
                        @endif
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="{{ route('wizard.store-payment-confirm') }}">
                        @csrf

                        <div class="grid grid-cols md:grid-cols-1 gap-4">
                            <div class="form-group mb-2">
                                <div class="flex items-center space-x-3">
                                    <div class="w-[50px]">
                                        <img src="{{ $paymentMethod->getFirstMediaUrl('payment-icon', 'thumb') }}" />
                                    </div>
                                    <div class="block mb-2 text-xl font-medium text-gray-900 dark:text-gray-300">
                                        {{ $paymentMethod->name }}</div>
                                </div>
                                <div
                                    class="flex flex-col space-y-2 md:space-y-0 md:bg-[#f5f5f5] md:w-1/2 md:flex-row drop-shadow-sm justify-start md:items-center rounded-xl mt-2">
                                    <div class="font-bold px-4 p-2 bg-[#f5f5f5] md:text-xl rounded-xl md:rounded-l-xl">
                                        {{ $paymentMethod->receiver_number }}</div>
                                    @if ($paymentMethod->is_ots == true)
                                        <div
                                            class="font-bold w-full md:w-full px-4 py-2 bg-[#f5f5f5] rounded-xl md:rounded-r-xl md:text-xl">
                                            {{ $paymentMethod->receiver_name }}</div>
                                    @else
                                        <div
                                            class="font-bold w-full md:w-full px-4 py-2 bg-[#f5f5f5] rounded-xl md:rounded-r-xl md:text-xl">
                                            a.n {{ $paymentMethod->receiver_name }}</div>
                                    @endif
                                </div>
                                <div class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300 mt-4">Nominal
                                    Transfer</div>
                                <div
                                    class="flex md:w-1/2 w-full bg-[#f5f5f5] items-center drop-shadow-sm p-2 space-x-4 rounded-xl">
                                    <div class="md:text-xl font-bold px-4">Rp.{{ number_format($paymentMethod->total) }}
                                    </div>
                                    <input type="hidden" name="total" value="{{ $paymentMethod->total }}">
                                </div>
                            </div>
                            <label class="block text-lg font-medium text-gray-900 dark:text-gray-300"
                                for="upload_file">Bukti
                                Pembayaran</label>
                            <input
                                class="block mb-5 md:w-1/2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none drop-shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="upload_file" type="file" accept="image/png, image/jpeg, image/jpg"
                                name="bukti-transfer" required />
                        </div>
                        <div class="flex flex-col space-y-3 md:space-y-0 md:flex-row md:justify-between mt-10">
                            <a href="{{ route('wizard.payment-method') }}"
                                class="text-white bg-primary-color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 md:w-[222px] font-medium rounded-lg text-sm md:text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                            <button type="submit"
                                class="text-white bg-primary-color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 md:w-[222px] font-medium rounded-lg text-sm md:text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Selanjutnya</button>
                        </div>
                    </form>
                @else
                    <h1 class="text-center text-xl md:text-[16px] font-medium">
                        Maaf, pembayaran sudah ditutup. Sampai Jumpa di EXPO Tahun depan :)
                    </h1>
                @endif

            </div>
        </div>
    </section>
@endsection
