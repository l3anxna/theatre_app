<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Theatre Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-[#0b0b0f] text-white font-[Poppins]">

<div class="flex min-h-screen">

    @include('layouts.navigation')

    <div class="flex-1">

        <header class="h-20 bg-[#16161d] border-b border-gray-800 flex items-center justify-between px-10">

            <div>
                @isset($header)
                    {{ $header }}
                @else
                    <h1 class="text-2xl font-semibold">
                        Theatre Manager
                    </h1>
                @endisset
            </div>

            <div class="text-gray-400">
                {{ now()->format('l, d M Y') }}
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <span class="text-gray-400">
                        {{ Auth::user()->name }}
                    </span>
                @endauth
            </div>

        </header>

        <main class="p-8">

            {{ $slot }}

        </main>

    </div>

</div>

</body>

</html>