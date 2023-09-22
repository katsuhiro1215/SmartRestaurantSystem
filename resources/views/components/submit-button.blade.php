@props(['name'])

@php
    $buttonStyles = [
        'store' => [
            'class' => 'text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
            'text' => '保存',
        ],
        'update' => [
            'class' => 'text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
            'text' => '更新',
        ],
        'delete' => [
            'class' => 'text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer',
            'text' => '削除',
        ],
    ];

    $buttonStyle = $buttonStyles[$name] ?? null;
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $buttonStyle['class']]) }}>
    {{ $buttonStyle['text'] }}
</button>
