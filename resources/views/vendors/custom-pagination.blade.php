<!-- resources/views/vendor/pagination/custom-pagination.blade.php -->
<div class="d-flex justify-content-center">
    <nav>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&laquo; Prev</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}">&laquo; Prev</a></li>
            @endif

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}">Next &raquo;</a></li>
            @else
                <li class="disabled"><span>Next &raquo;</span></li>
            @endif
        </ul>
    </nav>
</div>

<style>
    .pagination {
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        text-decoration: none;
        color: #7fb401 ;
        padding: 8px 12px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }

    .pagination li.active span {
        background-color: #7fb401 ;
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .pagination li.disabled span {
        color: #6c757d;
        padding: 8px 12px;
    }
</style>
