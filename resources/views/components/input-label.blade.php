@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-[#554E47]']) }}>
    {{ $value ?? $slot }}
</label>
