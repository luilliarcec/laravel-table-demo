<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;
use App\Support\BladeTable;
use App\Support\Filter;

class UsersController extends Controller
{
    public function index(UserIndexQuery $query, BladeTable $table)
    {
        return view('index', [
            'users' => $query->paginate(),
            'table' => $table
                ->addFilter('state', 'Status', Filter::SELECT, [
                    'active' => 'Active',
                    'inactive' => 'Inactive',
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
