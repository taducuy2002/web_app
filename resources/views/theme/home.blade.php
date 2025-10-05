@extends('theme.wrapper')

@section('title', 'VIP Corel - Theme Preview')

@section('body')
    <?php
        $path = resource_path('views/vipcorel.com/index.html');
        if (file_exists($path)) {
            $html = file_get_contents($path);
            // Rewrite asset URLs to route through /theme-asset
            $html = preg_replace(
                '#(href|src)="(css[^\"]+|js[^\"]+|styles[^\"]+|images[^\"]+|cdn-cgi[^\"]+|favicon[^\"]+|index\\.html|whats-new[^\"]+|ewr-porta[^\"]+|forums[^\"]+|threads[^\"]+|login[^\"]+|register[^\"]+|search[^\"]+|misc[^\"]+|help[^\"]+|members[^\"]+)"#i',
                '$1="' . e(route('theme.asset', '')) . '$2"',
                $html
            );
            echo $html;
        } else {
            echo '<p>Không tìm thấy file giao diện: resources/views/vipcorel.com/index.html</p>';
        }
    ?>
@endsection


