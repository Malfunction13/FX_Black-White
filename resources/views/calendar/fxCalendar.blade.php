@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section-heading d-flex">
            <i class="fas fa-chess-king fa-3x pt-4"></i>
            <div class="col">
                <div class="heading">Forex Calendar</div>
                <div class="description">All currencies, commodities, stocks and indices in one place!</div>
            </div>
            <i class="fas fa-chess-king fa-3x pt-4 fa-flip-horizontal"></i>
        </div>
    </div>
    <div class="container">
        <div class="content-section d-flex align-items-center flex-wrap">
            <div class="col-12 col-md-6">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div id="tradingview_c6709"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">All-in-One Chart</span></a> by TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget(
                            {
                                "width": "100%",
                                "height": 600,
                                "symbol": "FX:EURUSD",
                                "interval": "D",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "save_image": false,
                                "container_id": "tradingview_c6709"
                            }
                        );
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            <div class="col-12 col-md-6">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text">Economic Calendar</span></a> by TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                        {
                            "colorTheme": "light",
                            "isTransparent": false,
                            "width": "100%",
                            "height": 600,
                            "locale": "en",
                            "importanceFilter": "-1,0,1"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
    </div>
@endsection
