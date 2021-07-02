<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;
use Illuminate\Pagination\Paginator;
use Luilliarcec\LaravelTable\Support\BladeTable;
use Luilliarcec\LaravelTable\Support\Filter;

class UsersController extends Controller
{
    public function bootstrap5(UserIndexQuery $query, BladeTable $table)
    {
        config()->set('table.theme', 'bootstrap5');
        Paginator::useBootstrap();

        return view('bs-users', [
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

    public function tailwind(UserIndexQuery $query, BladeTable $table)
    {
        config()->set('table.theme', 'tailwind');
        Paginator::useTailwind();

        return view('tw-users', [
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
