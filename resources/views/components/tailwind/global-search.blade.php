<div class="relative">
    <input
        class="border-gray-300 focus:ring-1 focus:ring-red-900 focus:border-red-300 block w-full pr-10 text-sm rounded-md"
        name="filter[global]"
        type="text"
        placeholder="Search..."
        aria-label="Global search"
        value="{{ request('filter.global') }}"
    >

    <x-icons.search class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none"/>
</div>
