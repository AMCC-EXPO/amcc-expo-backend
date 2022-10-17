<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.head')

</head>

<body class="font-inter">
    @include('layouts.partials.header')

    <main class="relative">

        @yield('content')

        @include('layouts.partials.floating-wa')

    </main>

    @include('layouts.partials.footer-script')

</body>

</html>
