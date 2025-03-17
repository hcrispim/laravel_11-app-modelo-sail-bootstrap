{{--IMPLEMENTACAO WHITE--}}

{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link rel="preconnect" href="https://fonts.bunny.net">--}}
{{--        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}

{{--        <!-- Scripts -->--}}
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

{{--    </head>--}}
{{--    <body class="font-sans text-gray-900 antialiased">--}}
{{--        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">--}}
{{--            <div>--}}
{{--                <a href="/">--}}
{{--                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">--}}
{{--                {{ $slot }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </body>--}}
{{--</html>--}}

{{--    IMPLEMENTACAO BLACK--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        /* Garante que os inputs fiquem escuros no modo dark */
        [data-bs-theme="dark"] input {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
            border: 1px solid #444 !important;
        }

        /* Ajusta os inputs de email e senha para o modo escuro */
        [data-bs-theme="dark"] input[type="email"],
        [data-bs-theme="dark"] input[type="password"] {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
            border-color: #555 !important;
        }

        /* Placeholder visível no modo escuro */
        [data-bs-theme="dark"] ::placeholder {
            color: #aaaaaa !important;
            opacity: 1;
        }
    </style>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Dark Mode Styles -->
    <style>
        [data-bs-theme="dark"] {
            background-color: #121212 !important;
            color: #ffffff !important;
        }
        [data-bs-theme="dark"] .bg-white {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
        }
        [data-bs-theme="dark"] .text-gray-900 {
            color: #ffffff !important;
        }
        [data-bs-theme="dark"] .text-gray-600 {
            color: #cccccc !important;
        }
        [data-bs-theme="dark"] .hover\:text-gray-900:hover {
            color: #ffffff !important;
        }
    </style>
</head>
<body data-bs-theme="dark" class="font-sans antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-dark">
    <div>
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-white" />
        </a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
</body>
</html>
