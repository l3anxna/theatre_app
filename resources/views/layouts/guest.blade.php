<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
        Theatre Manager
    </title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link 
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }

    </style>


</head>



<body class="bg-stage-page text-stage-text antialiased">


<div class="min-h-screen flex items-center justify-center px-6">


    {{ $slot }}


</div>



</body>

</html>
