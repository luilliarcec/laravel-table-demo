<?php

namespace App\Http\Queries;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        parent::__construct(User::withTrashed(), $request);

        $this
            ->allowedFilters([
                'name',
                'email_verified_at',
                $this->filterVerified(),
                $this->filterEmailVerifiedAtRange(),
                $this->globalSearch(),
                $this->filterState(),
            ])
            ->allowedSorts([
                'name',
                'email'
            ]);
    }


    public function filterVerified(): AllowedFilter
    {
        return AllowedFilter::callback('verified', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->when(
                    in_array('verified', $value),
                    function ($query) { $query->whereNotNull('email_verified_at'); },
                    function ($query) { $query->whereNull('email_verified_at'); },
                );
            });
        });
    }

    public function filterEmailVerifiedAtRange(): AllowedFilter
    {
        return AllowedFilter::callback('email_verified_at_range', function ($query, $value) {
            $value = Str::of($value)->explode(' to ');

            $query->whereDate('email_verified_at', '>=', $value->first())
                ->whereDate('email_verified_at', '<=', $value->last());
        });
    }

    public function filterState(): AllowedFilter
    {
        return AllowedFilter::callback('state', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->when(
                    $value == 'inactive',
                    function ($query) { $query->onlyTrashed(); },
                    function ($query) { $query->withoutTrashed(); },
                );
            });
        });
    }

    public function globalSearch(): AllowedFilter
    {
        return AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query
                    ->where('email', 'LIKE', "%{$value}%");
            });
        });
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $paginator = parent::paginate($perPage, $columns, $pageName, $page);

        $paginator->appends(request()->query());

        return $paginator;
    }
}
