@extends('layouts.app')

@extends('layouts.app')


@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-bishop fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Reset password</div>
                    <div class="description">Please insert and confirm your new password below!</div>
                </div>
                <i class="fas fa-chess-bishop fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>
        <div class="container">
            <div class="content-section">
                <form action="" method="post" class="row justify-content-center px-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="column-flex align-items-center">
                        @if (session()->has('status'))
                            <div class="d-flex justify-content-center mb-3">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col">
                            <label for="password" class="required-field">Password</label>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control required-field" id="password">
                                @error('password')
                                <div class="text-red mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="password_confirmation">Confirm password</label>
                            <div class="mb-3">
                                <input type="password" name="password_confirmation" class="form-control" id="password">
                                @error('password_confirmation')
                                <div class="text-red mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" value="Submit" class="register-btn mt-3">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

