<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('partials.header')

    <!-- <div class="container mx-auto mt-6">
        @yield('content')
    </div> -->

    <div class="flex">
    <aside class="w-1/8 bg-gray-200 p-4">
        @include('partials.sidebar')
    </aside>
    <main class="w-3/4 p-6">
        @yield('content')
    </main>
</div>


    @include('partials.footer')
</body>
</html>