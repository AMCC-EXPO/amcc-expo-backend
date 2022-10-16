@extends('admin.layouts.app')

@section('title', 'Divisi')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Buat Divisi
        </h2>

        <div class="grid gap-6 mb-8">
            <div class="mx-auto min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <form enctype="multipart/form-data" action="{{ route('admin.divisions.update', [$division->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="name" placeholder="Nama" value="{{ $division->name }}"/>
                    </label>

                    <div class="mt-1">
                        <button type="submit"
                            class="mt-3 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Submit
                        </button>

                        <a class="px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                            href="{{ route('admin.divisions.index') }}">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
