<!-- Header -->
<div class="d-flex header">
    <div class="col-12">
        <!-- Logo-->
        <div class="row justify-content-center py-4 px-2">
            <img class="img-fluid" src="{{ URL::asset('assets/images/forex-trader.png') }}" alt="">
        </div>
        <!-- Navigation-->
        <div class="row justify-content-center py-4">
            <nav class="navbar navbar-expand-md d-flex justify-content-center text-uppercase">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white" style="color:#fff; font-size:28px;"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <a class="nav-item nav-link" href="/">Home</a>
                        <a class="nav-item nav-link" href="{{ route('calendar') }}">Forex Calendar</a>
                        <a class="nav-item nav-link" href="{{ route('subscribe') }}">Full access</a>
                        @auth
                            <a class="nav-item nav-link" href="{{ route('profile') }}">Profile</a>

                            <form action="{{ route('logout')}}"  method="post">
                                @csrf
                                <button type="submit" class="nav-item nav-link text-uppercase">Log out</button>
                            </form>
                        @endauth
                        @guest
                            <a class="nav-item nav-link" href="{{ route('login') }}">Log in</a>
                            <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
