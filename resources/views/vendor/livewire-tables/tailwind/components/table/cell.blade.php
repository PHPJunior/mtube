@props(['customAttributes' => []])

<td {{ $attributes->merge(array_merge(['class' => 'px-3 py-2 md:px-6 md:py-4 whitespace-nowrap text-sm leading-5 text-gray-900'], $customAttributes)) }}>
    {{ $slot }}
</td>
