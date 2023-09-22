<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @if (request()->is('owner*'))
            @include('layouts.owner-navigation')
        @elseif(request()->is('admin*'))
            @include('layouts.admin-navigation')
        @elseif(request()->is('employee*'))
            @include('layouts.employee-navigation')
        @else
            @include('layouts.user-navigation')
        @endif

        <!-- Page Content -->
        <main class="min-h-screen sm:ml-64">
            @if (request()->is('owner*'))
                @include('layouts.owner-sidebar')
            @elseif(request()->is('admin*'))
                @include('layouts.admin-sidebar')
            @elseif(request()->is('employee*'))
                @include('layouts.employee-sidebar')
            @else
                @include('layouts.user-sidebar')
            @endif

            <div class="bg-white shadow pt-16">
                <header class="h-full px-4 py-3 overflow-y-auto bg-gray-100 dark:bg-gray-800">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $header }}
                    </h2>
                </header>

                <nav class="flex justify-between items-center h-full px-4 py-3 overflow-y-auto bg-gray-100 dark:bg-gray-800"
                    aria-label="Breadcrumb">
                    {{ $breadcrumb }}
                </nav>
                <section class="text-gray-600 body-font">
                    <div class="container px-4 py-3 mx-auto">
                        @if (session('message'))
                            <x-toast :status="session('status', 'success')" :message="session('message')" />
                        @endif

                        {{ $slot }}
                    </div>
                </section>
            </div>
        </main>
        @include('layouts.footer')
    </div>
    {{-- <script>
        @if (Session::has('message'))
            let type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script> --}}
</body>

</html>
