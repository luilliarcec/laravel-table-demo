<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;
use Illuminate\Pagination\Paginator;

class UsersController extends Controller
{
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
