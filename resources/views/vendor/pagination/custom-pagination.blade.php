@if ($paginator->hasPages())

        @if ($paginator->onFirstPage())
            <div class="disabled search-button mr-2">Previous</div>
        @else
            <div class="mr-2"><a class="search-button" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></div>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <div class="disabled">{{ $element }}</div>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="disabled mx-2 search-button active ">{{ $page }}</div>
                    @else
                        <div class="mx-2"><a class="search-button" href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <div class="ml-2"><a class="search-button" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></div>
        @else
            <div class="disabled search-button ml-2">Next</div>
        @endif

@endif
