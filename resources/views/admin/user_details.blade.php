@extends('layouts.app')

@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">User details</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>
        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="row justify-content-center align-items-center admin-menu">
                        <a href="" class="mx-3">Users</a>
                        <a href="" class="mx-3">Administrators</a>
                        <a href="" class="mx-3">Posts</a>
                    </div>
                </div>

            </div>
        </section>
        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="col">
                        @include('layouts.status_info')
                        <div class="col-12 d-flex flex-column">
                            @include('admin.user_info')
                        </div>
                        <div class="row justify-content-between mt-3 px-5">
                            <div class="white-button"><a href="{{ route('userManagement', [$user->id]) }}">Manage user</a></div>
                            <div class="white-button"><a href="#open-modal-delete">Delete user</a></div>
                            <div id="open-modal-delete" class="modal-window">
                                <div class="overflow-hidden">
                                    <a href="#modal-close" title="Close" class="modal-close">close &times;</a>
                                    <h2>User deletion</h2>
                                    <div>You are about to delete this user</div>
                                    <form class="overflow-hidden" action="{{ route('userDelete', [$user->id]) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <input type="hidden" name="id" value={{ $user->id }}>
                                        <input type="submit" value="Confirm" class="register-btn mt-4 float-right">
                                    </form>
                                </div>
                            </div>
                            <form id="activate" method="POST" action="{{ route('userActivate', [$user]) }}" class="white-button">
                                @csrf
                                <a href="javascript:" onclick="document.getElementById('activate').submit()">Activate</a>
                            </form>
                            <div class="white-button"><a href="#open-modal-extend">Extend</a></div>
                            <div id="open-modal-extend" class="modal-window">
                                <div class="overflow-hidden">
                                    <a href="#modal-close" title="Close" class="modal-close">close &times;</a>
                                    <h2>Subscription extension</h2>
                                    <div>Please insert the number of months to prolong subscription</div>
                                    <form class="overflow-hidden" action="{{ route('userExtend', $user) }}" method="post">
                                        @csrf
                                        <label for="months">Extra Months:</label>
                                        <input type="number" name="months">
                                        <input type="submit" value="Confirm" class="register-btn mt-4 float-right">
                                    </form>
                                </div>
                            </div>
                            <form id="deactivate" method="POST" action="{{ route('userDeactivate', [$user]) }}" class="white-button">
                                @csrf
                                <a href="javascript:" onclick="document.getElementById('deactivate').submit()">Deactivate</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
@endsection
