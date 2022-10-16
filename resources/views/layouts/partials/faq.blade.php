<div class="container mx-auto px-[50px] md:px-[170px] mb-10">
    <div class="text-center text-lg mt-10 mb-5">
        <h1>Frequently Asked Questions (FAQ)</h1>
    </div>
    <div id="accordion-collapse" data-accordion="collapse">

        @foreach (\App\Models\Faq::all() as $faq)
            <h2 id="accordion-collapse-heading-2" class="mt-5">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border-2 border-gray-200 bg-white focus:ring-0 rounded-md dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-{{ $faq->id }}" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>{{ $faq->question }}</span>
                    <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-{{ $faq->id }}" class="hidden"
                aria-labelledby="accordion-collapse-heading-{{ $faq->id }}">
                <div class="p-5 font-light border border-b-2 border-gray-200 bg-white dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $faq->answer }}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>
