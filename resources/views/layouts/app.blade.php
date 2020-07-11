@include('shared.header')
<div id="app">
    <header>
        @include('shared.navbar')
    </header>
    
    <main class="py-4">
        @yield('content')
    </main>
</div>

@include('shared.footer')