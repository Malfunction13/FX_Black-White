@extends('layouts.app')


@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-bishop fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Log in</div>
                    <div class="description">If you forgot your username or password click the link below our log-in form.</div>
                </div>
                <i class="fas fa-chess-bishop fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>
        <div class="container">
            <div class="content-section">

                @include('layouts.status_info')

                <form action="{{ route('login') }}" method="post" class="row justify-content-center px-6">
                    @csrf
                    <div class="column-flex align-items-center">
                        @if (session()->has('status'))
                            <div class="d-flex justify-content-center mb-3">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col">
                            <label for="username" class="required-field">Username</label>
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control required-field" id="username" value="{{ old('username') }}">
                                @error('username')
                                <div class="text-red mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="password">Password</label>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" id="password">
                                @error('password')
                                <div class="text-red mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="remember">Remember me</label>
                                <input type="checkbox" name="remember" id="remember" class="mt-3">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" value="Log in" class="register-btn mt-3">
                        </div>
                    </div>
                </form>
                <a href="" id="forgot_password_modal" class="d-flex justify-content-center mt-3" data-toggle="modal" data-target="#global_modal" >Forgot password?</a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="module" src="{{ URL::asset('assets/js/login/modal_handler.js') }}"></script>
    <script type="module" src="{{ URL::asset('assets/js/login/forgot_pwd_handler.js') }}"></script>
@endsection
