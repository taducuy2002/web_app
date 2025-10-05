<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'VIP Corel')</title>
        <link rel="icon" type="image/png" href="{{ route('theme.asset', ['path' => 'styles/vipcorel.ico']) }}" sizes="32x32" />
        <link rel="stylesheet" href="{{ route('theme.asset', ['path' => 'css4024.css']) }}">
        <link rel="stylesheet" href="{{ route('theme.asset', ['path' => 'css3375.css']) }}">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @include('partials.header')
        @include('partials.breadcrumbs')
        <div class="layout-grid">
            <main>
                @yield('content')
            </main>
            @include('partials.sidebar')
        </div>
        @include('partials.footer')
    </body>
 </html>


