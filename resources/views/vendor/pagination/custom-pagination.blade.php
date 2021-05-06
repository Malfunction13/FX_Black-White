@if ($paginator->hasPages())

        @if ($paginator->onFirstPage())
            <div class="disabled">Previous</div>
        @else
            <div><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></div>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <div class="disabled">{{ $element }}</div>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="mx-2 active my-active">{{ $page }}</div>
                    @else
                        <div class="mx-2"><a href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <div><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></div>
        @else
            <div class="disabled">Next</div>
        @endif

@endif
