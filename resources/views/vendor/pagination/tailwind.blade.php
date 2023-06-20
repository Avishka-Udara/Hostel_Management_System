@if ($paginator->hasPages())
    
    <nav aria-label="{{ __('Pagination Navigation') }}" >
        <ul class="pagination justify-content-center p-">
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="page-item">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span class="page-link active">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}" class="page-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endif
