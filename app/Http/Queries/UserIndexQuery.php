<?php

namespace App\Http\Queries;

use App\Models\User;
use Illuminate\Http\Request;
use Luilliarcec\Components\Actions\Action;
use Luilliarcec\LaravelTable\Columns\BadgeColumn;
use Luilliarcec\LaravelTable\Columns\BooleanColumn;
use Luilliarcec\LaravelTable\Columns\TagsColumn;
use Luilliarcec\LaravelTable\Columns\TextColumn;
use Luilliarcec\LaravelTable\Filters\DateTimePickerFilter;
use Luilliarcec\LaravelTable\Filters\Plugins\Flatpickr;
use Luilliarcec\LaravelTable\Filters\SelectFilter;
use Luilliarcec\LaravelTable\Filters\TextFilter;
use Luilliarcec\LaravelTable\Queries\QueryBuilder;
use Luilliarcec\LaravelTable\Table;

class UserIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        parent::__construct(User::withTrashed(), $request);

        $this
            ->allowedSorts([
                'id',
                'name',
            ]);
    }

    public function table(): Table
    {
        return Table::make('users')
            ->searchable()
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name')
                    ->url(fn(User $record) => "https://ui-avatars.com/api/?name={$record->name}", true)
                    ->extraAttributes(['class' => 'whitespace-nowrap'])
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email address'),

                TextColumn::make('salary')
                    ->money(shouldConvert: true),

                BooleanColumn::make('home_office')
                    ->label('Work from office?'),

                TagsColumn::make('language_developer')
                    ->separator(),

                BadgeColumn::make('deleted_at')
                    ->label('State')
                    ->formatStateUsing(fn($state) => $state !== null ? 'Deleted' : 'Active')
                    ->colors([
                        'danger' => fn($state) => $state !== null,
                        'success' => fn($state) => $state === null
                    ]),

                TextColumn::make('created_at')
                    ->extraAttributes(['class' => 'whitespace-nowrap'])
                    ->label('Created At')
                    ->datetime(),
            ])
            ->filters([
                TextFilter::make('name'),
                DateTimePickerFilter::make('created_at')
                    ->flatpickr(
                        fn(Flatpickr $flatpickr) => $flatpickr
                            ->maxDate(now())
                            ->mode('range')
                    ),
                SelectFilter::make('state')
                    ->placeholder('Only actives')
                    ->options([
                        'only' => 'Only deleted',
                        'with' => 'All',
                    ]),
            ])
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
