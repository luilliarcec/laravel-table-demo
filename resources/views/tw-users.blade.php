<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <x-table::styles/>

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
            <x-table::table
                :meta="$users"
                :table="$table"
            >
                <x-slot name="head">
                    <tr>
                        <x-table::th column-key="id" class="border-gray-200" :show="true">
                            Id
                        </x-table::th>

                        <x-table::th column-key="name" class="border-gray-200" :sortable="true" :show="true">
                            Name
                        </x-table::th>

                        <x-table::th column-key="email" class="border-gray-200" :sortable="true">
                            Email
                        </x-table::th>

                        <x-table::th column-key="language_developer" class="border-gray-200" :sortable="true">
                            Language developer
                        </x-table::th>

                        <x-table::th column-key="email_verified_at" class="border-gray-200" :sortable="true">
                            Email verified at
                        </x-table::th>

                        <x-table::th column-key="deleted_at" class="border-gray-200" :sortable="true">
                            Deleted?
                        </x-table::th>

                        <x-table::th column-key="created_at" class="border-gray-200" :sortable="true">
                            Created at
                        </x-table::th>

                        <x-table::th column-key="updated_at" class="border-gray-200" :sortable="true">
                            Updated at
                        </x-table::th>
                    </tr>
                </x-slot>

                <x-slot name="body">
                    @foreach($users as $user)
                        <tr>
                            <x-table::th scope="row" column-key="id" :show="true">
                                {{ $user->id }}
                            </x-table::th>

                            <x-table::td column-key="name" :show="true">
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
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"
                                    >
                                        Deleted
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"
                                    >
                                        Active
                                    </span>
                                @endif
                            </x-table::td>

                            <x-table::td column-key="created_at">
                                {{ $user->created_at->isoFormat('ll') }}
                            </x-table::td>

                            <x-table::td column-key="updated_at">
                                {{ $user->updated_at->isoFormat('ll') }}
                            </x-table::td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table::table>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
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
