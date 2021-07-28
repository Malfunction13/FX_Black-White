@extends('layouts.app')

@section('head')
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery UI CSS -->
    <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
@endsection()

@section('content')

    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">User Management</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>

        @include('admin.adm_menu')

        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="col">
                        <div class="col-12 d-flex flex-column">
                            @include('admin.user_info')
                        </div>
                        <form action="{{ route('userUpdate', [$user]) }}" method="post" class="row justify-content-center px-6">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value={{ $user->id }}>
                            <div class="form-row justify-content-center content-section">
                                @include('layouts.status_info')
                                <div class="register-top col-md-6">
                                    <div class="col">
                                        <label for="username">Username</label>
                                        <div class="mb-3">
                                            <input type="text" name="username" class="form-control" id="update-username" placeholder="Username" value="{{ $user->username }}" required>
                                            @error('username')
                                            <div class="text-red mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Your email" value={{ $user->email }}>
                                            @error('email')
                                            <div class="text-red mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="role">Role</label>
                                        <div class="mb-3">
                                            <select id="update-role" name="role" class="form-control browser-default">
                                                <option value=0 {{ ($user->role===0) ? "selected" : "" }}>User</option>
                                                <option value=1 {{ ($user->role===1) ? "selected" : "" }}>Moderator</option>
                                                <option value=2 {{ ($user->role===2) ? "selected" : "" }}>Administrator</option>
                                            </select>
                                            @error('role')
                                            <div class="text-red mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="register-right col-md-6">
                                    <div class="col">
                                        <label for="subscribed">Subscribed</label>
                                        <div class="mb-3">
                                            <select id="subscribed" name="subscribed" class="form-control">
                                                <option value=0 {{ ($user->subscribed===0) ? "selected" : "" }}>False</option>
                                                <option value=1 {{ ($user->subscribed===1) ? "selected" : "" }}>True</option>
                                            </select>
                                        </div>
                                        @error('subscribed')
                                        <div class="text-red mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="expiry" >Expiry date</label>
                                        <div class="input-group" class="mb-3">
                                            <input id="datepicker"  name="expiry_date" type="text" class="form-control">
                                        </div>
                                    </div>
                                    @error('subscribed')
                                    <div class="text-red mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <input type="submit" value="Submit" class="register-btn mt-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script>
            $(document).ready(function(){
                $("#datepicker").datepicker({
                    dateFormat: 'dd-mm-yy', });
            });
        </script>
    </section>
@endsection()

