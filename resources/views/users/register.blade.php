@extends('layouts.app')


@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-bishop fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Registration</div>
                    <div class="description">Register to take instant advantage on Forex forecasts and signals</div>
                </div>
                <i class="fas fa-chess-bishop fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>
        <div class="container">
            <div>
                <form action="{{ route('register') }}" method="post" class="row justify-content-center px-6">
                    @csrf
                    <div class="form-row justify-content-center content-section">
                        @include('layouts.status_info')

                        <div class="register-top col-md-6">
                            <div class="col">
                                <label for="username">Username</label>
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ old('username') }}" required>
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
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Choose password" required>
                                    @error('password')
                                        <div class="text-red mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="register-right col-md-6">
                            <div class="col">
                                <label for="email">Email</label>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Your email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-red mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label for="password">Repeat password</label>
                                <div class="mb-3">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Repeat password" required>
                                    @error('password_confirmation')
                                        <div class="text-red mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Register" class="register-btn mt-3">
                    </div>
                </form>
            </div>
        </div>
    </section>





@endsection
