@if ($paginator->hasPages())
<ul class="d-flex justify-content-between">

    <!-- prev -->
    @if ($paginator->onFirstPage())
    <li class="btn btn-secondary">Prev</li>
    @else
    <li class="btn btn-primary" wire:click="previousPage">Prev</li>
    @endif
    

    <!-- numbers -->
    @foreach ($elements as $element)
    <div  class="d-flex pagination">
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item " wire:click="gotoPage({{$page}})"><a class="page-link text-white bg-primary" >{{$page}}</a></li>
        @else
        <li class="page-item" wire:click="gotoPage({{$page}})"><a class="page-link" >{{$page}}</a></li>
        @endif
        @endforeach
        @endif
    </div>
    

    @endforeach
    <!-- end numbers -->

    <!-- next  -->
    @if ($paginator->hasMorePages())
    <li class="btn btn-primary" wire:click="nextPage">Next</li>
    @else
    <li class="btn btn-secondary">Next</li>
    @endif
    <!-- next end -->




</ul>
@endif