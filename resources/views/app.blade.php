<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {!! Meta::toHtml() !!}

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="csrf-token" content="{{ csrf_token() }}"> -->

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Montserrat:wght@400;600;700&display=swap"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <!-- Scripts -->

        <link href="./lib/video-js/video-js.css" rel="stylesheet">
        <script src="./lib/video-js/video.min.js"></script>
        <script src="./lib/mask.js"></script>
        <meta name="yandex-verification" content="8196aac566930226">

    <!--
        <link href="lib/4.12.2/video-js.css" rel="stylesheet">
            <script src="lib/4.12.2/video.js"></script>
    -->

    <!--
        <link href="//vjs.zencdn.net/7.10.2/video-js.min.css" rel="stylesheet">
        <script src="//vjs.zencdn.net/7.10.2/video.min.js"></script>
    -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//site.com/playerjs.js" type="text/javascript"></script>

        <!--RangeSlider Pluging-->
        <script src="./src/rangeslider.js"></script>
        <link href="./build/rangeslider.min.css" rel="stylesheet">
        <script src="../assets/lib/video-js/playerjs.js" type="text/javascript"></script>
{{--        <link href="./veditor.css" rel="stylesheet">--}}
{{--        <script src="https://unpkg.com/vue-meta/dist/vue-meta.js"></script>--}}

        <!-- Yandex.Metrika counter -->
        <script>
         (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++)
         {if (document.scripts[j].src === r) { return; }}
          k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
          (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(91678412, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true });</script>

        <!-- /Yandex.Metrika counter -->

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        {{-- @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"]) --}}
        @inertiaHead

    </head>
    <body class="antialiased">
    <noscript>
            <div><img src="https://mc.yandex.ru/watch/91678412" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>

        @inertia

    </body>
</html>
