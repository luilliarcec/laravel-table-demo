<div>
    <div class="relative">
        <button
            type="button"
            class="w-full inline-flex justify-center py-2 px-4 border focus:outline-none disabled:opacity-50 disabled:cursor-default font-semibold leading-6 rounded shadow-sm hover:shadow focus:ring focus:ring-opacity-25 active:shadow-none border-gray-300 bg-white text-gray-800 hover:text-gray-800 hover:border-gray-300 focus:ring-gray-300 active:bg-white active:border-white"
            aria-expanded="false"
            ref="button"
        >
            <x-icons.colums/>
        </button>

        <div ref="tooltip" class="absolute z-10">
            <div class="mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <!-- Local -->
                <div class="px-4 py-3">
                    <ul class="divide-y divide-gray-200">
                        @foreach($columns as $key => $column)
                            <li class="py-2 flex items-center justify-between">
                                <label
                                    for="column_{{ $key }}"
                                    class="text-sm font-semibold tracking-wide text-gray-900">
                                    {{ $column->label }}
                                </label>

                                <div
                                    class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input
                                        type="checkbox"
                                        name="columns[]"
                                        id="column_{{ $key }}"
                                        value="{{ $key }}"
                                        class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
                                        {{ $column->enabled ? 'checked' : '' }}
                                    />

                                    <label
                                        for="column_{{ $key }}"
                                        class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
