<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Stagebook Thailand' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+Thai:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-stage-page text-stage-text font-sans antialiased">

<div class="min-h-screen lg:flex">

    @include('layouts.navigation')

    <div class="min-w-0 flex-1 pb-20 lg:pb-0">

        <header class="hidden h-20 border-b border-[#D8CEC1] bg-stage-surface/95 px-6 lg:flex lg:items-center lg:justify-between lg:px-10">

            <div>
                @isset($header)
                    {{ $header }}
                @else
                    <h1 class="text-2xl font-semibold">
                        Stagebook Thailand
                    </h1>
                @endisset
            </div>

            <div class="text-sm text-stage-muted">
                {{ now()->translatedFormat('D, j M Y') }}
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('profiles.show', Auth::user()) }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-[#2D2926] transition hover:bg-stage-elevated focus:outline-none focus:ring-2 focus:ring-[#B7791F]">{{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex min-h-10 items-center rounded-lg bg-[#A34A3E] px-4 text-sm font-bold text-white shadow-sm shadow-orange-950/30 transition hover:bg-[#8A3B32] focus:outline-none focus:ring-2 focus:ring-[#B7791F] focus:ring-offset-2 focus:ring-offset-stage-surface">Log in</a>
                @endauth
            </div>

        </header>

        <main class="px-4 py-6 sm:px-6 lg:p-8">

            {{ $slot }}

        </main>

    </div>

</div>

</body>

</html>
