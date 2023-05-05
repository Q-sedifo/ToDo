<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('components.head')
<body>
    @auth()
        @include('components.header')
    @endauth
    
    <main>
        @if (session()->has('success')) 
            <div class="message">{{ session()->get('success') }}</div>
        @endif

        <div class="content container">
            <noscript>No javascript</noscript>
            @yield('content')
        </div>

        @yield('modal')

        <!-- Pop-up window for animation -->
        <div class="pop-up"></div>
    </main>

    <!-- PWA Service worker -->
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>
</html>