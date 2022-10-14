@extends('admin.layouts.app')

@section('title', 'FAQ')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit FAQ
        </h2>

        <div class="grid gap-6 mb-8">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <form enctype="multipart/form-data" action="{{ route('admin.faqs.update', [$faq->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Pertanyaan</span>
                        <textarea
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Enter some long form content." name="question">{{ $faq->question }}</textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Jawaban</span>
                        <textarea
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Enter some long form content." name="answer">{{ $faq->answer }}</textarea>
                    </label>

                    <div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Publish?
                        </span>
                        <div class="mt-2">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="is_publish" value="1" {{ ($faq->is_publish == true) ? "checked" : "" }}/>
                                <span class="ml-2">Ya</span>
                            </label>
                            <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                <input type="radio"
                                    class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                                    name="is_publish" value="0" {{ ($faq->is_publish == false) ? "checked" : "" }}/>
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
                            href="{{ route('admin.faqs.index') }}">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
