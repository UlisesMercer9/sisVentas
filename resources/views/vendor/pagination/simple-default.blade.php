@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled waves-effect"><i class="material-icons">chevron_left</i></li>
        @else
            <li class="waves-effect"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons">chevron_left</i></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect"><a href="{{ $paginator->nextPageUrl() }}" rel="next"<i class="material-icons">chevron_right</i></li>
        @else
            <li class="disabled waves-effect"><i class="material-icons">chevron_right</i></li>
        @endif
    </ul>
@endif
