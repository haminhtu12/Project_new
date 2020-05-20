@extends('admin.main')
@php
use App\Helpers\Template as Template;

$xhtmlButtonFilter = Template::showButtonFileter($controllerName,$itemsStatusCount,$params['search']);
$xhtmlShowAreaSearch = Template::showAreasearch($controllerName,$params['search']);
@endphp
@section('content')
    @include('admin.templates.page_header',['pageIndex' =>true])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title',['title'=>'Bộ lọc'])
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-7">
                            {!! $xhtmlButtonFilter !!}
                        </div>
                        <div class="col-md-5">
                            {!! $xhtmlShowAreaSearch !!}
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!--box-lists-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title',['title'=>'Danh sách'])
                <div class="x_content">
                    @include('admin.pages.slider.list')
                </div>
            </div>
        </div>
        <!--end-box-lists-->
        <!--box-pagination-->
        @if(count($items) >0)
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        @include('admin.templates.x_title',['title'=>'Phân trang'])
                        @include('admin.templates.pagination')
                    </div>
                </div>
            </div>
    @endif
@endsection
