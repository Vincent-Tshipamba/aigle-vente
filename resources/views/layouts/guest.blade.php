<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Vincent Tshipamba & Carlo Musongela">
    <meta name="description"
        content="Aigle Vente est une plateforme de vente en ligne rapprochant les vendeurs et les acheteurs de produits de toutes sortes.">
    <link rel="shortcut icon" href="{{ asset('img\logo\logo_sans_bg.png') }}" type="image/x-icon">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://aiglevente.com/">
    <meta name="description" content="à la hauteur de votre desire.">

    <meta name="twitter:site" content="@aiglevente">
    <meta name="twitter:creator" content="@aiglevente">
    <meta name="twitter:card" content="à la hauteur de votre desire">
    <meta name="twitter:title" content="à la hauteur de votre desire">
    <meta name="twitter:description" content="à la hauteur de votre desire.">
    <meta name="twitter:image" content="https://aiglevente.com/img/logo/logo_sans_bg.pn">

    <meta property="og:url" content="https://aiglevente.com/">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Aigle Vente">
    <meta property="og:title" content="à la hauteur de votre desire.">
    <meta property="og:description" content="à la hauteur de votre desire.">
    <meta property="og:image" content="https://aiglevente.com/img/logo/logo_sans_bg.pn">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'aiglevente') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    {{ $slot }}

    <script>
        function signUpForm() {
            return {
                showPwd: false,
                showPwdConf: false,
                isLoading: false,
            };
        }
    </script>
    @livewireScripts
    @yield('script')
</body>

</html>
