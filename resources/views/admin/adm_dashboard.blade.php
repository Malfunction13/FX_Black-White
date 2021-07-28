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

        @include('admin.adm_menu')

        <section class="section">
            <div class="container ">
                <div class="content-section">
                    <div class="d-flex">
                        <div class="col-md-6 d-flex flex-column">
                            <table>
                                <tr><th>Functionality</th><th>Description</th></tr>
                                <tr>
                                    <td id="name">
                                        Users
                                    </td>
                                    <td id="link">
                                        <a href="">Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="name">
                                        Administrators
                                    </td>
                                    <td id="link">
                                        <a href="">Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="name">
                                        Posts
                                    </td>
                                    <td id="link">
                                        <a href="">Details</a>
                                    </td>
                                </tr>
                            </table>
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
    </section>
@endsection
