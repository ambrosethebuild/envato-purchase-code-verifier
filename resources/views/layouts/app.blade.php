<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ setting('favicon') }}" />
    <title>@yield('title', '') - {{ env('APP_NAME') }}</title>
    @include('envato-purchase-code-verifier::layouts.partials.styles')
    @yield('styles')
</head>

<body>
    {{ $slot ?? '' }}
    @yield('content')

    {{-- footer --}}
    @include('envato-purchase-code-verifier::layouts.partials.scripts')
    @stack('scripts')
</body>

</html>
