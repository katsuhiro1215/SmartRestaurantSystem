@props(['name'])

@php
    $badgeStyles = [
        'active' => [
            'class' => 'text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-xs px-2 py-1.5 text-center mr-2 mb-2',
            'text' => 'Active',
        ],
        'inactive' => [
            'class' => 'text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-full text-xs px-2 py-1.5 text-center mr-2 mb-2',
            'text' => 'Inactive',
        ],
        'show' => [
            'class' => 'text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-full text-xs px-2 py-1.5 text-center mr-2 mb-2',
            'text' => '詳細',
        ],
        'edit' => [
            'class' => 'text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-full text-xs px-2 py-1.5 text-center mr-2 mb-2',
            'text' => '編集',
        ],
    ];

    $badgeStyle = $badgeStyles[$name] ?? null;
@endphp

<a {{ $attributes->merge(['class' => $badgeStyle['class']]) }}>
    {{ $badgeStyle['text'] }}
</a>
