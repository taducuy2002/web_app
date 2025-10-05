<!DOCTYPE html>
<html id="XF" lang="vi-VN" dir="LTR" data-app="public" data-template="forum_list" data-container-key="" data-content-key="" data-logged-in="false" data-cookie-prefix="xf_" class="has-no-js template-forum_list">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'VIP Corel')</title>

    {{-- Original CSS from vipcorel.com snapshot --}}
    <link rel="stylesheet" href="{{ route('theme.asset', ['path' => 'css4024.css']) }}?css=public%3Anormalize.css%2Cpublic%3Afa.css%2Cpublic%3Acore.less%2Cpublic%3Aapp.less&amp;s=2&amp;l=2&amp;d=1752885637&amp;k=fe537a0ccd3ce0e6910e30eca1f8726b9bf010f9" />
    <link rel="stylesheet" href="{{ route('theme.asset', ['path' => 'css3375.css']) }}?css=public%3AEWRporta.less%2Cpublic%3AEWRporta_articles.less%2Cpublic%3AVNXF_Statistics_threads_widget.less%2Cpublic%3Aextra_footer.less%2Cpublic%3Alightbox.less%2Cpublic%3Anode_list.less%2Cpublic%3Anotices.less%2Cpublic%3Aextra.less&amp;s=2&amp;l=2&amp;d=1752885637&amp;k=96a1d49074f902dd95392cc840a73cac43896ff4" />
    <link rel="icon" type="image/png" href="{{ route('theme.asset', ['path' => 'styles/vipcorel.ico']) }}" sizes="32x32" />
</head>
<body class="is-structure-view">
    <div class="p-pageWrapper" id="top">
        @include('partials.vipcorel-header')

        <div class="p-body">
            <div class="p-body-inner">
                <div class="p-body-header">
                    @include('partials.vipcorel-breadcrumbs')
                </div>
                <div class="p-body-main">
                    <div class="p-body-content">
                        <div class="p-body-pageContent">
                            @yield('content')
                        </div>
                    </div>
                    <div class="p-body-sidebar">
                        @include('partials.vipcorel-sidebar')
                    </div>
                </div>
            </div>
        </div>

        @include('partials.vipcorel-footer')
    </div>

    {{-- JavaScript --}}
    <script src="{{ route('theme.asset', ['path' => 'js/vendor/jquery/jquery-3.5.1.minfd03.js']) }}?_v=02f20c1c"></script>
    <script src="{{ route('theme.asset', ['path' => 'js/vendor/vendor-compiledfd03.js']) }}?_v=02f20c1c"></script>
    <script src="{{ route('theme.asset', ['path' => 'js/xf/core-compiledfd03.js']) }}?_v=02f20c1c"></script>
    <script src="{{ route('theme.asset', ['path' => 'js/8wayrun/porta/portal.minfd03.js']) }}?_v=02f20c1c"></script>
    <script src="{{ route('theme.asset', ['path' => 'js/xf/lightbox-compiledfd03.js']) }}?_v=02f20c1c"></script>
    <script src="{{ route('theme.asset', ['path' => 'js/xf/notice.minfd03.js']) }}?_v=02f20c1c"></script>

    @yield('scripts')
</body>
</html>

