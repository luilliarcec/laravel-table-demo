<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;
use App\Support\BladeTable;
use App\Support\Filter;

class UsersController extends Controller
{
    public function __invoke(UserIndexQuery $query, BladeTable $table)
    {
        $view = 'bs-users';

        if (config('blade-table.theme') === 'tailwind')
            $view = 'tw-users';

        return view($view, [
            'users' => $query->paginate(),
            'table' => $table
                ->addFilter('state', 'Status', Filter::SELECT, [
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->addFilter('verified_check', 'Verified', Filter::CHECKBOX, [
                    'verified' => 'Verified',
                    'not_verified' => 'Not verified',
                ])
                ->addFilter('verified', 'Verified', Filter::SELECT_MULTIPLE, [
                    'verified' => 'Verified',
                    'not_verified' => 'Not verified',
                ])
                ->addFilter('name', 'Name', Filter::TEXT)
                ->addFilter('email_verified_at', 'Email Verified at', Filter::DATE)
                ->addFilter('email_verified_at_range', 'Email Verified at range', Filter::DATE_RANGE)
                ->addColumn('name', 'Name')
                ->addColumn('email_verified_at', 'Email verified at')
                ->build()
        ]);
    }
}
