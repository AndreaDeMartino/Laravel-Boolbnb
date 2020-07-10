@include('shared.header')
<div id="app">
    @include('shared.navbar')
    <main class="py-4">
        @yield('content')
    </main>
</div>

@include('shared.footer')