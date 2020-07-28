<nav class="navbar navbar-expand-md py-3 py-md-0 shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid" width="150" style="max-width: 100%" src="{{asset('images/logoBB.png')}}" alt="boolbnb logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <!-- <i class="fas fa-bars"></i> -->
            <div class="icon-anim"><span></span><span></span><span></span><span></span></div>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item u-dropdown">
                        <a class="nav-link" href="{{ route('login') }}">{{__('Accedi')}}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item u-dropdown">
                            <a class="nav-link pl-3" href="{{ route('register') }}">{{__('Registrati')}}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item u-nav-icon
                    @if ( Request::route()->getName() == 'user.place.create' )
                    u-active
                    @endif">
                        <a class="nav-link" href="{{ route('user.place.create') }}"> <img class="img-fluid d-none d-md-inline-block" style="max-width: 100%; display:inline-block;"  src="{{asset('images/addHome.svg')}}" alt="Aggiungi appartamento"> <span class="d-lg-none d-md-none"> Aggiungi casa</span></a>
                    </li>

                    <li class="nav-item u-nav-icon
                    @if ( Request::route()->getName() == 'user.myplace.index' )
                    u-active
                    @endif">
                        <a class="nav-link" href="{{ route('user.myplace.index') }}"><img class="img-fluid d-none d-md-inline-block" style="display:inline-block;"  src="{{asset('images/list.svg')}}" alt="Le tue inserzione"><span class="d-lg-none d-md-none"> Inserzioni</span></a>
                    </li>

                    <li class="nav-item u-nav-icon
                    @if ( Request::route()->getName() == 'user.inbox.index' )
                    u-active
                    @endif">
                        <a class="nav-link" href="{{ route('user.inbox.index') }}"><img class="img-fluid d-none d-md-inline-block" style="max-width: 100%; display:inline-block;"  src="{{asset('images/message.svg')}}" alt="Messaggi"><span class="d-lg-none d-md-none"> Messaggi</span></a>
                    </li>

                    <li class="nav-item dropdown u-dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="img-fluid d-none d-md-inline-block" style="max-width: 51%; display:inline-block;"  src="{{asset('images/user.svg')}}" alt="User">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right u-dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <img class="img-fluid" width="15" style="max-width: 100%; display:inline-block;"  src="{{asset('images/logout.svg')}}" alt="Logout">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>