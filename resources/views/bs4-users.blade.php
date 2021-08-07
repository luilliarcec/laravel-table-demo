<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <div class="row mb-4">
        <div class="col-12 text-right">
            <a href="/" class="btn btn-secondary"><- Back</a>
        </div>
    </div>

    <x-table::table
        :meta="$users"
        :table="$table"
    >
        <x-slot name="head">
            <tr>
                <x-table::th>
                    Id
                </x-table::th>

                <x-table::th column-key="name" sortable static>
                    Name
                </x-table::th>

                <x-table::th column-key="email" sortable>
                    Email
                </x-table::th>

                <x-table::th column-key="language_developer" sortable>
                    Language developer
                </x-table::th>

                <x-table::th column-key="email_verified_at" sortable>
                    Email verified at
                </x-table::th>

                <x-table::th column-key="deleted_at" sortable>
                    Deleted?
                </x-table::th>

                <x-table::th column-key="created_at" sortable>
                    Created at
                </x-table::th>

                <x-table::th column-key="updated_at" sortable>
                    Updated at
                </x-table::th>
            </tr>
        </x-slot>

        <x-slot name="body">
            @forelse($users as $user)
                <tr>
                    <x-table::th scope="row">
                        {{ $user->id }}
                    </x-table::th>

                    <x-table::td>
                        {{ $user->name }}
                    </x-table::td>

                    <x-table::td column-key="email">
                        {{ $user->email }}
                    </x-table::td>

                    <x-table::td column-key="language_developer">
                        {{ $user->language_developer }}
                    </x-table::td>

                    <x-table::td column-key="email_verified_at">
                        {{ $user->email_verified_at->isoFormat('ll') }}
                    </x-table::td>

                    <x-table::td column-key="deleted_at">
                        @if ($user->trashed())
                            <span class="badge badge-danger">Deleted</span>
                        @else
                            <span class="badge badge-success">Active</span>
                        @endif
                    </x-table::td>

                    <x-table::td column-key="created_at">
                        {{ $user->created_at->isoFormat('ll') }}
                    </x-table::td>

                    <x-table::td column-key="updated_at">
                        {{ $user->updated_at->isoFormat('ll') }}
                    </x-table::td>
                </tr>
            @empty
                <x-table::empty-table link="/"/>
            @endforelse
        </x-slot>
    </x-table::table>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
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
