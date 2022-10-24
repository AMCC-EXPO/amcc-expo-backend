@extends('admin.layouts.app')

@section('title', 'Tambah Member')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Member
        </h2>

        <div class="grid gap-6 mb-8">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 text-red-500" :errors="$errors" />

                @if (session('status'))
                    <div class="mb-4 text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold block">{{ session('status') }}</strong>
                        <span class="block">No.Reg: #{{ session('user')->registration_number }}</span>
                        <span class="block">NIM: {{ session('user')->nim }}</span>
                        <span class="block">Nama: {{ session('user')->name }}</span>
                        <span class="block">No.Hp: {{ session('user')->phone }}</span>
                        <span class="block">Email: {{ session('user')->email }}</span>
                        <span class="block">Password: <b>amccamikom</b></span>
                    </div>
                @endif

                <form enctype="multipart/form-data" action="{{ route('admin.members.store') }}" method="POST">
                    @csrf

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="name" placeholder="Nama lengkap" />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">NIM</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="nim" placeholder="xx.xx.xxxx" required />
                    </label>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <input type="email"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="email" placeholder="email@example.com" required />
                    </label>

                    <span class="mt-4 text-sm text-gray-700 dark:text-gray-400">Password default: <b>amccamikom</b></span>

                    <label class="mt-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">No. WhatsApp</span>
                        <input type="number"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="phone" placeholder="08XXXXXXXXXX" required />
                    </label>

                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Kirim email?
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="send_email" value="1" required checked />
                                <span class="ml-2">Ya</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="send_email" value="0" required />
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
                            href="{{ route('admin.members.index') }}">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
