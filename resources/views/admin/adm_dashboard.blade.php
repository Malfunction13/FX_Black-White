@extends('layouts.app')

@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Admin dashboard</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>
        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="row justify-content-center align-items-center admin-menu">
                        <a href="" class="mx-3">Users</a>
                        <a href="{{  route('adminManagement') }}" class="mx-3">Administrators</a>
                        <a href="" class="mx-3">Posts</a>
                    </div>
                </div>

            </div>
        </section>
        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="d-flex admin-menu">

                        <div class="col-md-6 d-flex flex-column">
                            <table>
                                <tr><th>username</th><th>subscribed</th><th>details</th></tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td id="username">
                                            {{ $user->username }}
                                        </td>
                                        @if ($user->subscribed)
                                            <td id="subscribed" class="text-success">
                                                True
                                            </td>
                                        @else
                                            <td id="subscribed" class="text-danger">
                                                False
                                            </td>
                                        @endif
                                        <td id="details">
                                            <a href="{{ route('userDetails', [$user->id]) }}">Details</a>
                                        </td>

                                    </tr>

                                @endforeach
                            </table>

                            <div class="row px-3 py-auto mt-auto">
                                {{ $users->links('vendor.pagination.custom-pagination') }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col">filters</div>
                            <div class="col">filters</div>
                            <div class="col">filters</div>
                            <div class="col">filters</div>
                            <div class="col">filters</div>
                            <div class="col">filters</div>

                            SUBMIT
                        </div>
                    </div>
                </div>

            </div>
        </section>
@endsection
