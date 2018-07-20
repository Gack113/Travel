@if ($paginator->hasPages())
    <!-- Pagination -->
    <div>
        <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            {{-- <li class="disabled">
                                <span><i class="fa fa-angle-double-left"></i></span>
                            </li> --}}
                            <li class="page-item disabled">
                                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-left"></span>
                                    </span>
                                </a>
                            </li>
                        @else
                            {{-- <li>
                                <a href="{{ $paginator->previousPageUrl() }}">
                                    <span><i class="fa fa-angle-double-left"></i></span>
                                </a>
                            </li> --}}
                            <li class="page-item">
                                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-left"></span>
                                    </span>
                                </a>
                            </li>
                        @endif
            
                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        {{-- <li class="active"><span></span></li> --}}
                                        <li class="page-item active"><a href="#" class="page-link">{{ $page }}</a></li>
                                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                                        {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                                        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                                    @elseif ($page == $paginator->lastPage() - 1)
                                    <li class="page-item disabled"><a href="{{ $url }}" class="page-link">...</a></li>
                                        {{-- <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li> --}}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
            
                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            {{-- <li>
                                <a href="{{ $paginator->nextPageUrl() }}">
                                    <span><i class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li> --}}
                            <li class="page-item">
                                <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-right"></span>
                                    </span>
                                </a>
                            </li>
                        @else
                        <li class="page-item disabled">
                                <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-right"></span>
                                    </span>
                                </a>
                            </li>
                        @endif
                    </ul>
        </nav>   
    </div>
    <!-- Pagination -->
@endif