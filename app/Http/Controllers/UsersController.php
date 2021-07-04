<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;
use Illuminate\Pagination\Paginator;
use Luilliarcec\LaravelTable\Support\BladeTable;
use Luilliarcec\LaravelTable\Support\Filter;

class UsersController extends Controller
{
    public function bootstrap5(UserIndexQuery $query)
    {
        config()->set('table.theme', 'bootstrap5');
        Paginator::useBootstrap();

        return view('bs-users', [
            'users' => $query->paginate(),
            'table' => $this->table(new BladeTable)
        ]);
    }

    public function tailwind(UserIndexQuery $query)
    {
        config()->set('table.theme', 'tailwind');
        Paginator::useTailwind();

        return view('tw-users', [
            'users' => $query->paginate(),
            'table' => $this->table(new BladeTable)
        ]);
    }

    private function table(BladeTable $table): object
    {
        return $table
            ->addFilter('trashed', 'Trahed', Filter::SELECT, [
                'without' => 'Only active',
                'only' => 'Only trashed',
            ])
            ->addFilter('name', 'Name', Filter::TEXT)
            ->addFilter('language_developer', 'Language developer', Filter::CHECKBOX, [
                'php' => 'PHP',
                'python' => 'Python',
                'c-sharp' => 'C-Sharp',
                'javascript' => 'Javascript',
                'dart' => 'Dart',
            ])
            ->addFilter('email_verified_at', 'Email Verified at', Filter::DATE)
            ->addFilter('created_at', 'Created at', Filter::DATE_RANGE)
            ->addColumn('email', 'Email')
            ->addColumn('language_developer', 'Language developer')
            ->addColumn('email_verified_at', 'Email verified at')
            ->addColumn('deleted_at', 'Deleted?')
            ->addColumn('created_at', 'Created at')
            ->addColumn('updated_at', 'Updated at');
    }
}
