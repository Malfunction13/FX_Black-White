@extends('layouts.app')

@section('content')
    <main class="row justify-content-center">
        @include('layouts.prices_widget')
        <!-- MAIN CONTENT -->
        <section class="section posts">
            <div class="container">
                <div class="section-heading d-flex">
                    <i class="fas fa-chess-bishop fa-3x pt-4"></i>
                    <div class="col">
                        <div class="heading">Welcome to FX Black & White</div>
                        <div class="description">Daily Financial Markets analysis, Forex calendar and highly accurate signals</div>
                    </div>
                    <i class="fas fa-chess-bishop fa-3x pt-4 fa-flip-horizontal"></i>
                </div>
            </div>
            <div class="container">
                <div class="content-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-image">
                                <img src="{{ URL::asset('assets/images/bear-market.webp') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-text">
                                <h4>Indices preparing for massive correction</h4>
                                <p>
                                    Stocks on Wall Street gained modestly on Monday, with the S&P 500 index hitting a
                                    fresh record of 4,187.6. Positive earnings surprises underpinned market confidence,
                                    offsetting the impact of US durable goods orders that came short of expectations.
                                    Traders will keep a close eye on the BoJ’s interest rate decision as well as the
                                    two-day FOMC meeting for clues about monetary policy guidance.
                                </p>
                                <div class="white-button">
                                    <a href="">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right aligned img -->
                <div class="content-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-text">
                                <h4>Your plans have changed?</h4>
                                <p>
                                    Frequently circumstances change and we understand that. For your convenience you can reschedule or
                                    cancel with few clicks your appointment through our website! Please give us at least 24 hours in
                                    advance so we can organize our work efficiently.
                                </p>
                                <div class="white-button">
                                    <a href="{% url 'booking-search' %}">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-image">
                                <img src="{{ URL::asset('assets/images/bull-market.webp') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection()
