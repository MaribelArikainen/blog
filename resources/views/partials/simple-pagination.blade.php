@if ($paginator->hasPages())
    <nav class="flex justify-center my-4" role="navigation" aria-label="Pagination">
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="join-item btn btn-disabled" aria-disabled="true">@lang('pagination.previous')</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="join-item btn">@lang('pagination.previous')</a>
            @endif
 
            {{-- Current Page --}}
            <button class="join-item btn btn-active">{{ $paginator->currentPage() }}</button>
 
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn">@lang('pagination.next')</a>
            @else
                <button class="join-item btn btn-disabled" aria-disabled="true">@lang('pagination.next')</button>
            @endif
        </div>
    </nav>
@endif