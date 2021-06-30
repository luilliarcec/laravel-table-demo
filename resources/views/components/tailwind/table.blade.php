<div>
    <form action="" class="mb-6">
        <div class="flex flex-wrap space-x-4 justify-end md:justify-between">
            @if($hasFilters())
                <x-filters
                    class="mt-2"
                    :filters="$table->filters"
                />
            @endif

            @if($hasGlobalSearch())
                <div class="flex-grow">
                    <x-global-search class="mt-2"/>
                </div>
            @endif

            @if($hasColumns())
                <x-columns
                    class="mt-2"
                    :columns="$table->columns"
                />
            @endif

            <div class="col-4 col-md-2 mt-2">
                <button type="submit" class="btn btn-dark w-100">
                    <x-icons.trigger/>
                </button>
            </div>
        </div>
    </form>

    <x-table-wrapper>
        <table class="min-w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-100">
            {{ $head }}
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
            {{ $body }}
            </tbody>
        </table>

        {{ $meta->links() }}
    </x-table-wrapper>
</div>
