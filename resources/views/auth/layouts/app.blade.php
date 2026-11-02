<!doctype html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Administrator &mdash; Kantor Hukum Nurul Syafii</title>
    <meta name="description" content="Portal Masuk Administrator Kantor Hukum Nurul Syafii" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png">

    <!-- Fonts Google: Cinzel & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- FontAwesome / Tabler Icons for password toggle & aesthetic -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vite Tailwind Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #070F1E;
            color: #F8FAFC;
        }
        .font-serif-heading {
            font-family: 'Cinzel', Georgia, serif;
        }
    </style>
</head>

<body class="min-h-full flex flex-col bg-ns-navy-950 text-slate-100 antialiased selection:bg-ns-gold-400 selection:text-ns-navy-950">
    <x-loader />

    @yield('contents')

    @stack('scripts')
</body>
</html>
