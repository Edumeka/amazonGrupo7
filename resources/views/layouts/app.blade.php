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
    <link rel="icon" href="{{ asset('logo-amazon.png') }}" type="image/png">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles for Amazon-like Design -->
    <style>
        /* Background color for header */
        .bg-amazon-blue {
            background-color: #131921;
        }

        /* Text colors */
        .amazon-text {
            color: #fff;
        }

        .amazon-text-light {
            color: #131921; /* Dark text for light mode */
        }

        /* Button style similar to Amazon */
        .amazon-button {
            background-color: #FF9900;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .amazon-button:hover {
            background-color: #FF8000;
        }

        .amazon-header {
            background-color: #131921;
            color: white;
            padding: 20px 0;
        }

        /* Dark mode styles */
        .dark .bg-amazon-blue {
            background-color: #131921;
        }

        .dark .amazon-header {
            background-color: #131921;
        }

        .dark .amazon-text {
            color: #fff;
        }

        .dark .amazon-button {
            background-color: #FF9900;
        }

        /* Footer */
        .footer {
            background-color: #131921;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white text-gray-900 dark:bg-gray-900 dark:text-white">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation (Similar to Amazon's top bar) -->
        @include('layouts.navigation')

        <!-- Page Heading (Header) -->
        @isset($header)
            <header class="amazon-header shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="footer mt-8">
            <p>&copy; {{ date('Y') }} Amazon Clone | All rights reserved.</p>
        </footer>
    </div>

    <!-- Toggle Dark Mode Script -->
    <script>
        const toggleDarkMode = () => {
            const currentTheme = localStorage.getItem('theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            localStorage.setItem('theme', newTheme);
            document.documentElement.classList.toggle('dark', newTheme === 'dark');
        };

        // Check the saved theme preference from localStorage and apply it
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.documentElement.classList.toggle('dark', savedTheme === 'dark');
        }
    </script>
</body>
</html>
