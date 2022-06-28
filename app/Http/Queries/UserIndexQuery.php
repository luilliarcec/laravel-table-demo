<?php

namespace App\Http\Queries;

use App\Models\User;
use Illuminate\Http\Request;
use Luilliarcec\Components\Actions\Action;
use Luilliarcec\Components\Actions\Confirmation;
use Luilliarcec\LaravelTable\Columns\BadgeColumn;
use Luilliarcec\LaravelTable\Columns\BooleanColumn;
use Luilliarcec\LaravelTable\Columns\TagsColumn;
use Luilliarcec\LaravelTable\Columns\TextColumn;
use Luilliarcec\LaravelTable\Filters\DateTimePickerFilter;
use Luilliarcec\LaravelTable\Filters\Plugins\Flatpickr;
use Luilliarcec\LaravelTable\Filters\SelectFilter;
use Luilliarcec\LaravelTable\Filters\TextFilter;
use Luilliarcec\LaravelTable\Queries\Filters\DateRangeFilter;
use Luilliarcec\LaravelTable\Queries\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class UserIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        parent::__construct(User::query(), $request);
    }

    protected function getAllowedFilters(): array
    {
        return array_merge(
            parent::getAllowedFilters(), [
                'name',
                AllowedFilter::custom('created_at', new DateRangeFilter()),
                AllowedFilter::trashed('state', 'deleted_at'),
            ]
        );
    }

    protected function tableName(): string
    {
        return 'users';
    }

    protected function tableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->visibleFrom('lg')
                ->sortable(),

            TextColumn::make('name')
                ->label('Name')
                ->url(fn(User $record) => "https://ui-avatars.com/api/?name={$record->name}")
                ->openUrlInNewTab()
                ->extraAttributes(['class' => 'whitespace-nowrap'])
                ->searchable()
                ->sortable(),

            TextColumn::make('email')
                ->searchable()
                ->tooltip('This is email')
                ->label('Email address'),

            TextColumn::make('salary')
                ->default(0)
                ->alignRight()
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
        ];
    }

    protected function tableFilters(): array
    {
        return [
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
        ];
    }

    protected function tableActions(): array
    {
        return [
            Action::make('show')
                ->iconButton()
                ->url(fn(User $record) => route('users.show', $record))
                ->openUrlInNewTab()
                ->icon('heroicon-s-eye')
                ->size('md'),

            Action::make('delete')
                ->hidden(fn (User $record) => $record->trashed())
                ->iconButton()
                ->url(fn(User $record) => route('users.destroy', $record))
                ->confirmation(
                    fn(Confirmation $confirmation) => $confirmation
                        ->method('delete')
                        ->title('Are you sure?')
                )
                ->icon('heroicon-s-trash')
                ->size('md'),
        ];
    }

    protected function tableEmptyStateActions(): array
    {
        return [
            Action::make('create')
                ->label('Create new record')
                ->button()
                ->outlined()
                ->url('/')
                ->openUrlInNewTab()
        ];
    }
}
