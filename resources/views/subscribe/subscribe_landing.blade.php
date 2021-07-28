@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-image">
                        <img src={{ URL::asset('assets/images/bull-market.webp') }} alt="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-text text-break text-wrap">
                        <h4>Why you need this?</h4>
                        <p>


                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet egestas ligula, quis vehicula mauris. Fusce dapibus pretium gravida. Etiam sed tempor ipsum. Quisque et posuere tellus. Etiam eu consequat sapien. Vivamus tincidunt pretium enim in cursus. Donec sed velit at quam dignissim tristique quis sed dolor. Morbi magna tellus, porta et dui ut, viverra vestibulum sapien. Vivamus eget magna id odio pretium lacinia. Mauris elementum hendrerit felis non dignissim. Nulla facilisi. Curabitur ut mi eget tortor ultrices maximus. Donec aliquet purus ipsum, eu placerat augue lacinia a. Aliquam vel quam felis. Quisque eleifend aliquet diam quis tincidunt. Curabitur laoreet diam tincidunt nisi commodo sagittis.

                            Sed pharetra, felis vel efficitur varius, tellus metus cursus erat, tincidunt elementum massa diam et sapien. Sed fermentum volutpat justo ac venenatis. Integer velit.                        </p>
                        <div class="white-button text-right my-4">
                            <a href="">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="left-text text-break text-wrap">
                        <h4>What you get?</h4>
                        <p>


                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in nibh viverra, rhoncus diam id, pulvinar dolor. Mauris purus quam, consequat sit amet risus ut, sagittis porttitor nisi. Mauris id libero quis ipsum viverra hendrerit. Aliquam erat volutpat. Nulla varius dui sed massa pulvinar porta. Nullam massa odio, dictum sit amet justo eget, egestas laoreet lectus. Nulla ut gravida enim. Nunc auctor dolor in luctus varius.

                            Vestibulum eu consequat diam, eu lobortis odio. Suspendisse potenti. Morbi tristique pretium est in accumsan. Aliquam et proin.
                        </p>
                        <div class="white-button my-4">
                            <a href="">Subscribe now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="{{ URL::asset('assets/images/bear-market.webp') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
