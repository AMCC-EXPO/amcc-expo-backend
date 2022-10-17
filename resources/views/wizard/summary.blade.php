@extends('layouts.app')

@section('title', 'Metode Pembayaran')

@section('content')

    @include('layouts.partials.timeline')

    <section id="input-data">
        <div class="flex flex-col-reverse md:space-y-0 md:flex-row md:px-10">
            <div class="flex flex-col bg-white drop-shadow-md md:w-full p-20 rounded-xl">
                <div class="alert flex items-center justify-between p-4 mb-4 text-sm text-yellow-600 bg-yellow-100 rounded-lg"
                    role="alert">
                    <span class="font medium">
                        Silahkan bergabung ke Grup WhatsApp. <a href="{{ \App\Models\Setting::first()->link_group }}"
                            target="_blank"><u>KLIK DISINI</u></a></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="close flex-shrink-0 inline w-3 h-3 mr-3 cursor-pointer"
                        viewBox="0 0 384 512">
                        <path
                            d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                    </svg>
                </div>
                <div class="mb-5 space-y-3">
                    <h1 class="text-lg md:text-2xl font-bold">Ringkasan</h1>
                </div>
                <form>
                    <div class="grid grid-cols md:grid-cols-2">
                        <div class="form-group mb-2">
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">Nama Lengkap :</div>
                                <div class="">{{ $user->name }}</div>
                            </div>
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">NIM :</div>
                                <div class="">{{ $user->nim }}</div>
                            </div>
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">No. Whatsapp :</div>
                                <div class="">{{ $user->phone }}</div>
                            </div>
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">Program Studi :</div>
                                <div class="">{{ $user->program_study }}</div>
                            </div>
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">E-mail :</div>
                                <div class="">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">Pilihan Divisi :</div>
                                <div class="">{{ $user->division->name }}</div>
                            </div>
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">Kenal AMCC darimana ? :</div>
                                <div class="">{{ $user->reference_source }}</div>
                            </div>
                            <div class="block md:w-1/2 w-full rounded-xl mt-2">
                                <div class="md:text-xl font-bold">Alamat Domisili :</div>
                                <div class="">{{ $user->address }}</div>
                            </div>
                            <div class="block md:w-1/2 w-full rounded-xl mt-2 space-y-3">
                                <div class="md:text-xl font-bold">Status Pendaftaran</div>
                                @if ($status == 'paid')
                                    <div
                                        class="text-white bg-[#07DA4F] focus:outline-none focus:ring-blue-300 md:w-[222px] font-medium rounded-lg text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Berhasil</div>
                                @else
                                    <div
                                        class="text-black bg-yellow-200 focus:outline-none focus:ring-blue-300 md:w-[222px] font-medium rounded-lg text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Sedang di Review</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-5 md:space-y-0 md:flex-row md:justify-between mt-10">
                        <button type="submit"
                            class="text-white bg-primary-color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 px-3 py-2 md:w-[222px] font-medium rounded-lg text-sm md:text-lg md:px-5 md:py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ubah
                            Data</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
