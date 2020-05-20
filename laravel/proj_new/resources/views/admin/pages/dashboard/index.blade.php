
@extends('admin.main')
@section('content')
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>DashBoard</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>DashBoard</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6"><a
                            href="?filter_status=all" type="button"
                            class="btn btn-primary">
                        All <span class="badge bg-white">4</span>
                    </a><a href="?filter_status=active"
                           type="button" class="btn btn-success">
                        Active <span class="badge bg-white">2</span>
                    </a><a href="?filter_status=inactive"
                           type="button" class="btn btn-success">
                        Inactive <span class="badge bg-white">2</span>
                    </a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!--box-lists-->
<!--end-box-lists-->
<!--box-pagination-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Phân trang
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
            </div>
        </div>
    </div>
</div>
@endsection