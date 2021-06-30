<select
    class="block focus:ring-1 focus:ring-primary focus:border-primary w-full shadow-sm text-sm border-gray-300 rounded-md"
    name="{{ $name }}"
>
    @foreach($filter->options as $key => $option)
        <option
            value="{{ $key }}"
            {{ $isSelected($key) ? 'selected' : '' }}
        >
            {{ $option }}
        </option>
    @endforeach
</select>
