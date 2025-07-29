<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi SPA Laravel + Vue 2</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav style="padding: 10px; background-color: #eee; margin-bottom: 20px; text-align: center;">
            <router-link to="/" style="margin-right: 15px; color: #3490dc; text-decoration: none; font-weight: bold;">Inicio</router-link>
            <router-link to="/about" style="color: #3490dc; text-decoration: none; font-weight: bold;">Sobre Nosotros</router-link>
        </nav>
        <router-view></router-view>
    </div>

    @stack('scripts')
</body>
</html>