<!doctype html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Administrator &mdash; Kantor Hukum Nurul Syafii</title>
    <meta name="description" content="Portal Masuk Administrator Kantor Hukum Nurul Syafii" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('interface/img/LOGO_NS_2.png') }}" type="image/png">

    <!-- Fonts Google: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome / Tabler Icons for password toggle & aesthetic -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vite Tailwind Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, * {
            font-family: 'Poppins', sans-serif !important;
        }
        body {
            background-color: #070F1E;
            color: #F8FAFC;
        }
        .font-serif-heading {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>

<body class="min-h-full flex flex-col bg-ns-navy-950 text-slate-100 antialiased selection:bg-ns-gold-400 selection:text-ns-navy-950">
    <x-loader />

    @yield('contents')

    @stack('scripts')
</body>
</html>
