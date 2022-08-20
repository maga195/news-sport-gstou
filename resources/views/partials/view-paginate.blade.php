<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/style.css') }}"/>
@if ($paginator->hasPages())
    <ul >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&laquo;</span>
        </li> -->
        <li aria-disabled="true" aria-label="@lang('pagination.previous')"><a class="disabled" ><i class="fa fa-angle-left"></i></a></li>
        <!-- <li>
            <a class="prev">&laquo;</a>
        </li> -->
        @else
        <li>
            <!-- <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="prev">&laquo;</a> -->
            <li ><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-left"></i></a></li>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <!-- <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li> -->
            <li class="disabled" aria-disabled="true">{{ $element }}</li>
            @endif

        {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <!-- <li aria-current="page"><span class="active">{{ $page }}</span></li> -->
                    <li class="active" aria-current="page"><a class="active">{{ $page }}</a></li>
                    @else
                    <!-- <li><a href="{{ $url }}">{{ $page }}</a></li> -->
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <!-- <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="next">&raquo;</a>

        </li> -->
            <li ><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-right"></i></a></li>
        @else
        <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&raquo;</span>
        </li> -->
        <li aria-disabled="true" aria-label="@lang('pagination.previous')"><a class="disabled" ><i class="fa fa-angle-right"></i></a></li>
        @endif
    </ul>
@endif
