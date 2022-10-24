@extends('admin.layouts.app')

@section('title', 'Member')

@section('content')
    <div class="container grid px-6 pb-16 mx-auto">

        <div class="divisi-wrapper flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                <span>Member</span>
            </h2>
            <a href="{{ route('admin.members.create') }}"
                class="button flex px-4 h-8 text-sm font-medium text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                <span class="mt-1">
                    Tambah Member
                </span>
            </a>
        </div>

        @if (session('status'))
            <div class="mb-4 text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold block">{{ session('status') }}</strong>
            </div>
        @endif

        <div class="flex justify-start flex-1 mb-4 lg:mr-32">
            <div class="relative w-full max-w-xl focus-within:text-blue-500">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>

                <label class="block mt-1 text-sm">
                    <div class="relative text-gray-500 focus-within:text-blue-600">
                        <form action="{{ route('admin.members.index') }}">

                            <input type="number"
                                class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray form-input"
                                placeholder="Nomor Registrasi" value="{{ Request::get('keyword') }}" name="keyword" />
                            <button
                                class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-r-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                Cari
                            </button>
                        </form>
                    </div>
                </label>
            </div>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Tanggal Daftar</th>
                            <th class="px-4 py-3">NO.REG</th>
                            <th class="px-4 py-3">NIM</th>
                            <th class="px-4 py-3">Nama</th>
                            {{-- <th class="px-4 py-3">Email</th> --}}
                            <th class="px-4 py-3">Nomor HP</th>
                            <th class="px-4 py-3">Metode Pembayaran</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                        @forelse ($users as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ date_format($user->created_at, 'd/m/Y H:i') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <b>#{{ $user->registration_number }}</b>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->nim }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->name }}
                                </td>
                                {{-- <td class="px-4 py-3 text-sm">
                                    {{ $user->email }}
                                </td> --}}
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->phone }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $user->payment->payment_method_id != null ? $user->payment->paymentMethod->name : 'Belum memilih' }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    @if ($user->payment->status == 'paid')
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Lunas
                                        </span>
                                    @elseif ($user->payment->status == 'review')
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                            Perlu di Review
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                            Belum Bayar
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        @if ($user->payment->payment_method_id != null)
                                            @if ($user->payment->paymentMethod->name == 'Pembayaran Cash' && $user->payment->status == 'review')
                                                <form
                                                    onsubmit="return confirm('Yakin ingin menyetujui pembayarannya?')"
                                                    class="d-inline"
                                                    action="{{ route('admin.approve', [$user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                                    <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Reset Password" type="submit">

                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif

                                        <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Review" type="button" alt="Review"
                                            href="{{ $user->payment->status != 'unpaid' ? route('admin.review', [$user->id]) : '#' }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>

                                        {{-- <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit" type="button"
                                            href="{{ route('admin.members.edit', [$user->id]) }}">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a> --}}

                                        <form
                                            onsubmit="return confirm('Yakin ingin mereset ke password default? (amccamikom)')"
                                            class="d-inline"
                                            action="{{ route('admin.members.reset-password', [$user->id]) }}"
                                            method="POST">
                                            @csrf
                                            {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Reset Password" type="submit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>

                                        <form onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline"
                                            action="{{ route('admin.members.destroy', [$user->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete" type="submit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm text-center" colspan="10">
                                    Belum ada data
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-5">
                    Page {{ $users->currentPage() }}
                    {{-- Showing 21-30 of 100 --}}
                </span>

                {{-- <span class="col-span-2"></span> --}}

                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <a href="{{ $users->previousPageUrl() }}"
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-blue"
                                    aria-label="Previous">
                                    {{-- <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg> --}}
                                    Previous
                                </a>
                            </li>

                            {{-- <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                                    1
                                </button>
                            </li>
                            --}}

                            <?php
                            $lastPage = $users->lastPage();
                            $pages = $users->getUrlRange(1, $lastPage);
                            $i = 1;
                            ?>


                            @foreach ($pages as $page)
                                <li>
                                    <a href="{{ $page }}"
                                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                                        {{ $i }}
                                    </a>
                                </li>
                                <?php $i = $i + 1; ?>
                            @endforeach

                            {{--
                            <li>
                                <button
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-blue-600 border border-r-0 border-blue-600 rounded-md focus:outline-none focus:shadow-outline-blue">
                                    3
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                                    4
                                </button>
                            </li>
                            <li>
                                <span class="px-3 py-1">...</span>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                                    8
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                                    9
                                </button>
                            </li> --}}
                            <li>
                                <a href="{{ $users->nextPageUrl() }}"
                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-blue"
                                    aria-label="Next">
                                    {{-- <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg> --}}
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                    {{-- <span class="items-center">
                        Page {{ $users->currentPage() }}
                    </span> --}}
                </span>
            </div>
        </div>

    </div>
    </div>
@endsection
