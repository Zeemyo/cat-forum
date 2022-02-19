<ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
  <li class="page-item disabled">
    @if($paginator->lastPage() > 1)
    <a href="{{ $paginator-> url(1) }}" class="page-link has-icon"><i class="material-icons">previous</i></a>
    </li>
    @for($i = 1; $i <= $paginator->lastPage(); $i ++)
    @if ($paginator->currentPage() == $i)
    <li class="page-item disabled"><a href="{{ $paginator-> url($i) }}" class="page-link">{{ $i }}</a></li>
    @else
    <li class="page-item"><a href="{{ $paginator-> url($i) }}" class="page-link">{{ $i }}</a></li>
    @endif
    @endfor
    <li class="page-item">
      <a href="{{ $paginator-> url($paginator->lastPage()) }}" class="page-link has-icon"><i class="material-icons">Next</i></a>
    </li>
  </ul>

  @endif
