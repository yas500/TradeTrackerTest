<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>TradeTracker</title>
        <base href="{{ mg_url() }}/">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ mg_url('/favicon.ico') }}">
    </head>
    <body>
        <app-root></app-root>
        <script type="text/javascript" src="{{ mg_url('/inline.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ mg_url('/polyfills.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ mg_url('/styles.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ mg_url('/vendor.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ mg_url('/main.bundle.js') }}"></script>
    </body>
</html>
