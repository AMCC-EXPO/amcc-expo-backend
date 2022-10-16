<header class="flex bg-white p-5 items-center space-x-5 justify-between mx-auto">

    <div class="flex items-center space-x-2 md:space-x-5">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('user/img/amcc.png') }}" alt="" class="w-[32px] h-[32px] md:w-[61px] md:h-[61px]" />
        </a>
        <h1 class="md:text-2xl md:text-[28px] text-black font-medium">Amikom Computer Club</h1>
    </div>

    <div class="flex items-center space-x-3">
        <h1 class="hidden md:flex">Halo, {{ Auth::user()->name }}</h1>

        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
            class="text-white bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-3 md:px-4 md:py-4 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 md:w-6 md:h-6 fill-gray-500">
                <path
                    d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
            </svg>
        </button>

        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                <li>
                    <a href="{{ \App\Models\Setting::first()->link_group }} }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Join
                        grup Whatsapp</a>
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    <li>
                        @csrf
                        <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="event.preventDefault(); this.closest('form').submit();" href="">
                            Logout
                        </a>
                    </li>
                </form>
            </ul>
        </div>

    </div>
    
</header>
