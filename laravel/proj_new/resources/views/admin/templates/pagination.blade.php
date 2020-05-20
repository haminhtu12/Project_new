@php
    $totalItem = $items->total();
    $totalPage = $items->lastPage();
    $totalItem = $items->perpage();

@endphp
<div class="x_content">
    <div class="row">
        <div class="col-md-6">
            <p class="m-b-0">Số phần tử trên 1 trang: <b>{{$totalItem}}</b>
            <p> tổng số trang  : {{$totalPage}}</p>
            <p> tổng số phần tử   : {{$totalItem}}</p>
        </div>
        <div class="col-md-6">

{{--            {{ $items->links('pagination.pagination_backend',['items' => $items]) }}--}}
            {!!  $items->appends(request()->input())->links('pagination.pagination_backend',['items' => $items]) !!}
        </div>
    </div>
</div>
