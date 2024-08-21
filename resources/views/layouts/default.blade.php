<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
    }

    .page-item {
        margin: 0 5px;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: default;
    }

    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .page-link {
        display: block;
        padding: 0.5rem 0.75rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        color: #007bff;
        text-decoration: none;
        border-radius: 0.25rem;
        transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
    }

    .page-link:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
        color: #0056b3;
    }
</style>
<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        {{-- First Page Link --}}
        <li class="page-item {{ ($paginator->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="First">
                &laquo; First
            </a>
        </li>

        {{-- Previous Page Link --}}
        @if($paginator->currentPage() > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous">
                    &lsaquo; Previous
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>

        {{-- Pagination Links --}}
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ($from < $i && $i < $to)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">
                        {{ $i }}
                    </a>
                </li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if($paginator->currentPage() < $paginator->lastPage())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next">
                    Next &rsaquo;
                </a>
            </li>
        @endif

        {{-- Last Page Link --}}
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">
                Last &raquo;
            </a>
        </li>
    </ul>
@endif
