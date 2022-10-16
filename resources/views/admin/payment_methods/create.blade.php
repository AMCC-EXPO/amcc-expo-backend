@extends('admin.layouts.app')

@section('title', 'Metode Pembayaran')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Buat Metode Pembayaran
        </h2>

        <div class="grid gap-6 mb-8">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <form enctype="multipart/form-data" action="{{ route('admin.payment-methods.store') }}" method="POST">
                    @csrf

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Metode</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="name" placeholder="ex. BCA" />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Logo / Icon</span>
                        <input
                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            name="icon" id="file_input" type="file">
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Penerima</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="receiver_name" placeholder="Nama Penerima" />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Rekening Penerima</span>
                        <input type="number"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="receiver_number" placeholder="Rekening Penerima" />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Biaya Tambahan (Rupiah)</span>
                        <input type="number"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="fee" placeholder="Biaya Tambahan" />
                    </label>

                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Hanya OTS?
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="is_ots" value="1" />
                                <span class="ml-2">Ya</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="is_ots" value="0" />
                                <span class="ml-2">Tidak</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Aktif?
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="is_active" value="1" />
                                <span class="ml-2">Ya</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="is_active" value="0" />
                                <span class="ml-2">Tidak</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-1">
                        <button type="submit"
                            class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Submit
                        </button>

                        <a class="px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                            href="{{ route('admin.payment-methods.index') }}">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
