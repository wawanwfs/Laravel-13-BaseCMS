@props([
    'title' => config('app.name', 'Laravel CMS Starter'),
    'metaDescription' => 'A reusable Laravel Blade CMS starter kit.',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="themeController()" x-init="init()" :class="{ dark: isDark }" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:type" content="website">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-dvh bg-slate-50 text-slate-950 antialiased transition-colors duration-300 dark:bg-slate-950 dark:text-white">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-xl focus:bg-slate-950 focus:px-4 focus:py-3 focus:text-sm focus:font-semibold focus:text-white dark:focus:bg-white dark:focus:text-slate-950">Skip to main content</a>
    <x-toast />
    <x-navbar />
    <main id="main-content" tabindex="-1">{{ $slot }}</main>
    <x-footer />
</body>
</html>
