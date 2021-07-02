<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <x-table::styles/>
</head>
<body>
<div class="container mt-5">
    <x-table::table
        :meta="$users"
        :table="$table"
    >
        <x-slot name="head">
            <tr>
                <x-table::th column-key="id" class="border-gray-200" :show="true">
                    Id
                </x-table::th>

                <x-table::th column-key="name" class="border-gray-200" :sortable="true">
                    Name
                </x-table::th>

                <x-table::th column-key="email" class="border-gray-200" :sortable="true" :show="true">
                    Email
                </x-table::th>

                <x-table::th column-key="email_verified_at" class="border-gray-200">
                    Email verified at
                </x-table::th>
            </tr>
        </x-slot>

        <x-slot name="body">
            @foreach($users as $user)
                <tr>
                    <x-table::th scope="row" column-key="id" :show="true">
                        {{ $user->id }}
                    </x-table::th>

                    <x-table::td column-key="name">
                        {{ $user->name }}
                    </x-table::td>

                    <x-table::td column-key="email" :show="true">
                        {{ $user->email }}
                    </x-table::td>

                    <x-table::td column-key="email_verified_at">
                        {{ $user->email_verified_at->isoFormat('ll') }}
                    </x-table::td>
                </tr>
            @endforeach
        </x-slot>
    </x-table::table>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous">
</script>
<x-table::scripts/>
<script>
    const dateRanges = document.querySelectorAll('.filter-date-range');

    dateRanges.forEach(e => flatpickr(e, {
        mode: 'range'
    }));

    const dates = document.querySelectorAll('.filter-date');

    dates.forEach(e => flatpickr(e))
</script>
</body>
</html>
