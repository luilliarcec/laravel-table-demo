<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div id="page-container" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100">
    <main id="page-content" class="flex flex-auto flex-col max-w-full pt-16">
        <div class="max-w-10xl mx-auto p-4 pt-0 lg:p-10 lg:pt-0 w-full">
            <x-table
                :meta="$users"
                :table="$table"
            >
                <x-slot name="head">
                    <tr>
                        <th class="border-gray-200">#</th>
                        <x-th column-key="name" class="border-gray-200" :sortable="true">Name</x-th>
                        <x-th column-key="email" class="border-gray-200" :sortable="true" :show="true">Email</x-th>
                        <x-th column-key="email_verified_at" class="border-gray-200">Email verified at</x-th>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <x-td column-key="name">{{ $user->name }}</x-td>
                            <td>{{ $user->email }}</td>
                            <x-td
                                column-key="email_verified_at">{{ $user->email_verified_at->isoFormat('ll') }}</x-td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    </main>
</div>
</body>
</html>
