@extends('layouts.app')

@section('content')
    <section class="section posts">
        <div class="container">
            <div class="section-heading d-flex">
                <i class="fas fa-chess-king fa-3x pt-4"></i>
                <div class="col">
                    <div class="heading">Adminstrator Management</div>
                </div>
                <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
            </div>
        </div>
        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="d-flex admin-menu">

                        <div class="col-md-6 d-flex flex-column">
                            <table>
                                <tr><th>Username</th><th>email</th><th>Role</th><th>details</th></tr>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td id="username">
                                            {{ $admin->username }}
                                        </td>
                                        <td id="email">
                                            {{ $admin->email }}
                                        </td>
                                        <td id="role">
                                            @if ($admin->role === 0)
                                                User
                                            @elseif($admin->role === 1)
                                                Moderator
                                            @else
                                                Administrator
                                            @endif
                                        </td>
                                        <td id="details">
                                            <a href="{{ route('userDetails', [$admin->id]) }}">Details</a>
                                        </td>

                                    </tr>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection()
