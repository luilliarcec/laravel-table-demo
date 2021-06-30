<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="container mt-5">
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
                    <x-td column-key="email_verified_at">{{ $user->email_verified_at->isoFormat('ll') }}</x-td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
</div>
</body>
</html>
