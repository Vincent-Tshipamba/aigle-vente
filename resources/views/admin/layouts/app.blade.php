<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Vincent Tshipamba & Carlo Musongela">
    <meta name="description"
        content="Aigle Vente est une plateforme de vente en ligne rapprochant les vendeurs et les acheteurs de produits de toutes sortes.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/logo/logo_sans_bg.png') }}" type="image/x-icon">

    <title>{{ $title ?? 'Dashboard Admin Aigle Vente' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="body bg-white dark:bg-[#1E293B] text-black">
    <div class=" bg-gray-100 dark:bg-[#1E293B] ">
        @include('admin.layouts.navigation')
        <div class="duration-500 ease-in-out transform content ">
            <div class=" dark:bg-[#1e293bf3] bg-white pt-20 px-2 md:px-5 pb-4 ml-12  backdrop-blur-2xl">
                <!-- Page Content -->
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const sidebar = document.querySelector("aside");
        const maxSidebar = document.querySelector(".max")
        const miniSidebar = document.querySelector(".mini")
        const roundout = document.querySelector(".roundout")
        const maxToolbar = document.querySelector(".max-toolbar")
        const logo = document.querySelector('.logo')
        const content = document.querySelector('.content')
        const moon = document.querySelector(".moon")
        const sun = document.querySelector(".sun")

        function setDark(val) {
            if (val === "dark") {
                document.documentElement.classList.add('dark')
                moon.classList.add("hidden")
                sun.classList.remove("hidden")
            } else {
                document.documentElement.classList.remove('dark')
                sun.classList.add("hidden")
                moon.classList.remove("hidden")
            }
        }

        function openNav() {
            if (sidebar.classList.contains('-translate-x-48')) {
                // max sidebar
                sidebar.classList.remove("-translate-x-48")
                sidebar.classList.add("translate-x-none")
                maxSidebar.classList.remove("hidden")
                maxSidebar.classList.add("flex")
                miniSidebar.classList.remove("flex")
                miniSidebar.classList.add("hidden")
                maxToolbar.classList.add("translate-x-0")
                maxToolbar.classList.remove("translate-x-24", "scale-x-0")
                logo.classList.remove("ml-12")
                // ontent.classList.remove("ml-12")
                // content.classList.add("ml-12", "md:ml-60")
            } else {
                // mini sidebar
                sidebar.classList.add("-translate-x-48")
                sidebar.classList.remove("translate-x-none")
                maxSidebar.classList.add("hidden")
                maxSidebar.classList.remove("flex")
                miniSidebar.classList.add("flex")
                miniSidebar.classList.remove("hidden")
                maxToolbar.classList.add("translate-x-24", "scale-x-0")
                maxToolbar.classList.remove("translate-x-0")
                logo.classList.add('ml-12')
            }
        }
    </script>
    @yield('script')
</body>

</html>
