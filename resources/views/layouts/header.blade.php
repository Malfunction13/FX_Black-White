<!-- Header -->
<div class="d-flex header">
    <div class="col-12">
        <!-- Logo-->
        <div class="row justify-content-center py-4">
            <img src="{{ URL::asset('assets/images/forex-trader.png') }}">
        </div>

        <!-- Navigation-->
        <nav class="row justify-content-center text-uppercase" id="mainNav">
            <a class="nav-item nav-link" href="/">Analysis</a>
            <a class="nav-item nav-link" href="{{ route('calendar') }}">Forex Calendar</a>
            <a class="nav-item nav-link" href="/">Signals</a>
            @auth
                <form action="{{ route('logout')}}"  method="post">
                    @csrf
                    <button type="submit" class="nav-item nav-link">Log out</button>
                </form>

                <a class="nav-item nav-link" href="{{ route('profile') }}">Profile</a>
            @endauth
            @guest
                <a class="nav-item nav-link" href="{{ route('login') }}">Log in</a>
                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
            @endguest
        </nav>
    </div>
</div>
