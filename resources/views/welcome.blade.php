<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Theatre Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-stage-page text-stage-text">

<header class="absolute top-0 left-0 w-full px-10 py-8 flex justify-between items-center">

    <div class="flex items-center gap-3">
        <div class="text-4xl">
            🎭
        </div>

        <h1 class="text-2xl font-semibold tracking-wide">
            Theatre Manager
        </h1>
    </div>


    @if(Route::has('login'))

    <nav class="flex gap-4">

        @auth

        <a href="{{ route('dashboard') }}">
           class="px-6 py-2 rounded-full bg-[#A34A3E] hover:bg-[#A34A3E] transition">
            Dashboard
        </a>

        @else

        <a href="{{route('login')}}"
           class="px-6 py-2 rounded-full border border-[#B8AC9E] hover:border-[#B7791F] transition">
            Login
        </a>


        @if(Route::has('register'))

        <a href="{{route('register')}}"
           class="px-6 py-2 rounded-full bg-[#B7791F] text-black hover:bg-yellow-400 transition">
            Register
        </a>

        @endif

        @endauth

    </nav>

    @endif

</header>



<main class="min-h-screen flex items-center justify-center px-6">


<section class="max-w-5xl text-center">


<div class="mb-8">

<span class="text-7xl">
🎭
</span>

</div>


<h2 class="text-5xl md:text-7xl font-bold leading-tight">

Manage Your

<span class="text-[#B7791F]">
 Theatre
</span>

Like Never Before

</h2>



<p class="mt-8 text-[#746D64] text-lg max-w-2xl mx-auto">

A modern platform to manage shows, actors, venues,
and performances in one elegant system.

</p>



<div class="mt-10 flex justify-center gap-5">


<a href="{{route('login')}}"
class="px-10 py-4 rounded-full bg-[#A34A3E]
hover:bg-red-700 transition text-lg font-medium">

Get Started

</a>


<a href="#F4E2B6tures"
class="px-10 py-4 rounded-full border border-[#CFC4B6]
hover:border-[#B7791F] transition text-lg">

Explore

</a>


</div>



<div class="mt-20 grid md:grid-cols-3 gap-6">


<div class="bg-[#FFFCF7] p-8 rounded-2xl border border-[#D8CEC1]">

<div class="text-4xl mb-4">
🎬
</div>

<h3 class="text-xl font-semibold">
Shows
</h3>

<p class="text-[#746D64] mt-2">
Manage productions and schedules
</p>

</div>



<div class="bg-[#FFFCF7] p-8 rounded-2xl border border-[#D8CEC1]">

<div class="text-4xl mb-4">
👥
</div>

<h3 class="text-xl font-semibold">
Actors
</h3>

<p class="text-[#746D64] mt-2">
Organize your performers
</p>

</div>



<div class="bg-[#FFFCF7] p-8 rounded-2xl border border-[#D8CEC1]">

<div class="text-4xl mb-4">
🏛️
</div>

<h3 class="text-xl font-semibold">
Venues
</h3>

<p class="text-[#746D64] mt-2">
Control theatre locations
</p>

</div>


</div>


</section>


</main>


</body>
</html>
