@if (isset($paginator) && $paginator->lastPage() > 1)
    <nav aria-label="page navigation example">
        <ul class="pagination pagination-sm justify-content-center mymargin5">
            @php
                $interval = isset($interval) ? abs(intval($interval)) : 2;
                $from = $paginator->currentPage() - $interval;
                if ($from < 1) {
                    $from = 1;
                }
                $to = $paginator->currentPage() + $interval;
                if ($to > $paginator->lastPage()) {
                    $to = $paginator->lastPage();
                }
            @endphp

            {{-- 처음, 이전 --}}
            @if ($paginator->currentPage() > 1)
                <li class="page-item">
                    <a href="{{ $paginator->url(1) }}" class="page-link" aria-label="First">
                        <span aria-hidden="true">◀</span>
                    </a>
                </li>

                <li class="page-item">
                    <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="page-link"
                        aria-label="Previous">
                        <span aria-hidden="true">◁</span>
                    </a>
                </li>
            @endif

            {{-- 페이지번호들 --}}
            @for ($i = $from; $i <= $to; $i++)
                @php
                    $isCurrentPage = $paginator->currentPage() == $i;
                @endphp
                <li class="page-item {{ $isCurrentPage ? 'active' : '' }}">
                    <a class="page-link"
                        href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- 다음, 끝 --}}
            @if ($paginator->currentPage() < $paginator->lastPage())
                <li class="page-item">
                    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="page-link" aria-label="Next">
                        <span aria-hidden="true">▷</span>
                    </a>
                </li>

                <li class="page-item">
                    <a href="{{ $paginator->url($paginator->lastpage()) }}" class="page-link" aria-label="Last">
                        <span aria-hidden="true">▶</span>
                    </a>
                </li>
            @endif

        </ul>
    </nav>

@endif
