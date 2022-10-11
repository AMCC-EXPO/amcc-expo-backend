<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>

    @include('admin.layouts.partials.head')

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('admin.layouts.partials.sidebar')

        <div class="flex flex-col flex-1 w-full">

            @include('admin.layouts.partials.header')

            <main class="h-full overflow-y-auto">

                @yield('content')

            </main>
        </div>
    </div>
</body>

</html>
