<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;
use Illuminate\Pagination\Paginator;

class UsersController extends Controller
{
    public function bootstrap4(UserIndexQuery $query)
    {
        config()->set('table.theme', 'bootstrap4');
        Paginator::useBootstrap();

        return view('bs4-users', [
            'users' => $query->paginate(),
            'table' => $query->table()
        ]);
    }

    public function bootstrap5(UserIndexQuery $query)
    {
        config()->set('table.theme', 'bootstrap5');
        Paginator::useBootstrap();

        return view('bs-users', [
            'users' => $query->paginate(),
            'table' => $query->table()
        ]);
    }

    public function tailwind(UserIndexQuery $query)
    {
        config()->set('table.theme', 'tailwind');
        Paginator::useTailwind();

        return view('tw-users', [
            'users' => $query->paginate(),
            'table' => $query->table()
        ]);
    }
}
