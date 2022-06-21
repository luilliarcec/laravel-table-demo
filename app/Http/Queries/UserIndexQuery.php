<?php

namespace App\Http\Queries;

use App\Models\User;
use Illuminate\Http\Request;
use Luilliarcec\LaravelTable\Queries\QueryBuilder;

class UserIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        parent::__construct(User::withTrashed(), $request);
    }

    public function table(): mixed
    {
        return 'TABLA';
    }
}
