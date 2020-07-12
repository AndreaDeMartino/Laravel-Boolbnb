@include('shared.header')
<div id="app">
    <header>
        @include('shared.navbar')
    </header>
    
    <main class="container">
        @yield('content')
    </main>
</div>

@include('shared.footer')