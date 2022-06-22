<?php

namespace App\Http\Queries;

use App\Models\User;
use Illuminate\Http\Request;
use Luilliarcec\LaravelTable\Actions\Action;
use Luilliarcec\LaravelTable\Queries\QueryBuilder;
use Luilliarcec\LaravelTable\Table;

class UserIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        parent::__construct(User::withTrashed(), $request);
    }

    public function table(): Table
    {
        return Table::make('users')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create new record')
                    ->button()
                    ->outlined()
                    ->url('/')
                    ->openUrlInNewTab()
            ]);
    }
}
