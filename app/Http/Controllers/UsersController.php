<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;
use Illuminate\Pagination\Paginator;
use Luilliarcec\LaravelTable\Support\BladeTable;
use Luilliarcec\LaravelTable\Support\Filter;

class UsersController extends Controller
{
    public function __invoke(UserIndexQuery $query)
    {
        return view('index', [
            'table' => $query->table()
        ]);
    }
}
