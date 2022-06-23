<?php

namespace App\Http\Controllers;

use App\Http\Queries\UserIndexQuery;

class UsersController extends Controller
{
    public function __invoke(UserIndexQuery $query)
    {
        return view('index', [
            'table' => $query->toPaginate()
        ]);
    }
}
