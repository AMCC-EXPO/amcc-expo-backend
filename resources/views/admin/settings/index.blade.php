@extends('admin.layouts.app')

@section('title', 'Setting')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Setting
        </h2>

        <div class="grid gap-6 mb-8">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <form enctype="multipart/form-data" action="{{ route('admin.settings.update', [$setting->id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                    {{-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Pesan
                    </h4> --}}

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Pengumuman</span>
                        <textarea
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Enter some long form content." name="announcement">{{ $setting->announcement }}</textarea>
                    </label>

                    <h4 class="mt-6 mb-1 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Pendaftaran
                    </h4>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nomor awal pendaftar</span>
                        <input type="number"
                            class="block w-150 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="initial_registration_number" placeholder="Nomor awal pendaftar"
                            value="{{ $setting->initial_registration_number }}" required />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Biaya</span>
                        <input type="number"
                            class="block w-150 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="price" placeholder="price" value="{{ $setting->price }}" required />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Dibuka pada</span>
                        <input type="date"
                            class="w-50 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="date_start" value="{{ $setting->date_start }}" />
                        <input type="time"
                            class="w-50 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="opening_hours" value="{{ $setting->opening_hours }}" />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Ditutup pada</span>
                        <input type="date"
                            class="w-50 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="date_end" value="{{ $setting->date_end }}" />
                        <input type="time"
                            class="w-50 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="closing_hours" value="{{ $setting->closing_hours }}" />
                    </label>

                    <h4 class="mt-6 mb-1 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        WhatsApp
                    </h4>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nomor WA CS</span>
                        <input type="number"
                            class="block w-150 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="cs_number" placeholder="628xxxxxx" value="{{ $setting->cs_number }}" />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Link Grup WA</span>
                        <input
                            class="block w-150 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="link_group" placeholder="https://xxxxx" value="{{ $setting->link_group }}" />
                    </label>

                    <div class="mt-1">
                        <button type="submit"
                            class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
