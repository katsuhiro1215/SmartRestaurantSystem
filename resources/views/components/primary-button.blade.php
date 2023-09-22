@props(['name'])

@php
    $buttonStyles = [
        'search' => [
            'class' => 'text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
            'text' => '郵便番号から検索',
        ],
    ];

    $buttonStyle = $buttonStyles[$name] ?? null;
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => $buttonStyle['class']]) }}>
    {{ $buttonStyle['text'] }}
</button>
