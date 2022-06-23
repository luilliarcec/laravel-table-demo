<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <x-tables::styles/>

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<div id="page-container" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100 dark:bg-gray-800">
    <main id="page-content" class="flex flex-auto flex-col max-w-full pt-16">
        <div class="max-w-10xl mx-auto p-4 pt-0 lg:p-10 lg:pt-0 w-full">
            <div class="flex-row mb-4">
                <div class="flex-col w-full text-right">
                    <a href="/"
                       class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <- Back
                    </a>
                </div>
            </div>

            {{ $table }}
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<x-tables::scripts/>
<script>
    localStorage.theme = 'dark'

    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
</body>
</html>
