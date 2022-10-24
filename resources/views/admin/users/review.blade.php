@extends('admin.layouts.app')

@section('title', 'Review')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Review Pembayaran
        </h2>

        <div class="grid gap-6 mb-8">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <form enctype="multipart/form-data" action="{{ route('admin.approve', [$user->id]) }}" method="POST">
                    @csrf

                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div class="min-w-0 p-4 bg-white rounded-lg dark:bg-gray-800">
                            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                                Bukti Pembayaran
                            </h4>
                            <img src="{{ $payment->getFirstMediaUrl('bukti-transfer', 'thumb') }}" width="400px">
                        </div>
                        <div class="min-w-0 p-4 bg-white rounded-lg dark:bg-gray-800">
                            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                                Detail Pembayaran
                            </h4>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    Nomor Pendaftaran
                                </h6>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    #{{ $user->registration_number }}
                                </p>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    Nama
                                </h6>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    {{ $user->name }}
                                </p>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    NIM
                                </h6>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    {{ $user->nim }}
                                </p>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    Metode Pembayaran
                                </h6>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    {{ $payment->paymentMethod->name }}
                                </p>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    Rekening Tujuan
                                </h6>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    {{ $payment->paymentMethod->receiver_number . ' a.n ' . $payment->paymentMethod->receiver_name }}
                                </p>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    Nominal
                                </h6>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Rp.{{ number_format($payment->amount) }}
                                </p>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    Upload Bukti Pembayaran
                                </h6>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    {{ date_format($payment->updated_at, 'd/m/Y H:i:s') }}
                                </p>
                            </div>
                            <div>
                                <h6 class="mb-1 font-semibold text-gray-600 dark:text-gray-300">
                                    Status
                                </h6>
                                @if ($payment->status == 'paid')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Lunas
                                    </span>
                                @elseif ($payment->status == 'review')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Perlu di Review
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                        Belum Bayar
                                    </span>
                                @endif
                            </div>
                            <div class="mt-6">
                                @if ($payment->status == 'review')
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        Setujui
                                    </button>
                                @endif

                                <a class="px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                                    href="{{ route('admin.members.index') }}">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
