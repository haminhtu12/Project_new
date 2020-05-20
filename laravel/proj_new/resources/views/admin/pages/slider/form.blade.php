@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    $formInputClass = config('zvn.template.form_input.class');
    $formLabelClass = config('zvn.template.form_label.class');
    $nameInput = Form::text( 'name', $item['name'],['class' => $formInputClass]);
    $statusValue = [
        'default'=>'SelectStatus',
        'active'=>'Active',
        'inactive'=>'Inactive'
];
    $elements = [
        [
            'label'=> Form::label('name', 'Name ', ['class' => $formLabelClass]),
            'element'=> Form::text( 'name', $item['name'],['class' => $formInputClass])
            ],
        [
            'label'=> Form::label('Description', 'Description ',  ['class'  => $formLabelClass]),
            'element'=> Form::text( 'Description', $item['description'],['class' => $formInputClass])
            ],
        [
            'label'=> Form::label('Status', 'Status ',  ['class'  => $formLabelClass]),
            'element'=> Form::select('size', $statusValue,  $item['status'], ['class' => $formInputClass])
            ],
             [
            'label'=> Form::label('link', 'Link ',  ['class'  => $formLabelClass]),
            'element'=> Form::text( 'link', $item['link'],['class' => $formInputClass])
            ],
             [
            'label'=> Form::label('thumb', 'thumb ',  ['class'  => $formLabelClass]),
            'element'=>Form::file('thumb', ['class'  => $formLabelClass])
            ],
            [
            'element'=>   Form::button('<i class="fa fa-save"></i>', [ 'class' => 'btn btn-success'] ),
             'type'=> 'btn-submit',
            ],
];
@endphp
@section('content')
    @include('admin.templates.page_header',['pageIndex' =>false])
    <!--box-lists-->
    <div class="row">
        @php
        @endphp
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title',['title'=>'Form '])
                {{ Form::open([
                                'method'=>'POST',
                                'url'=>route("$controllerName/save"),
                                'enctype'=>"multipart/form-data",
                                'class'=>"form-horizontal form-label-left",
                                'id'=>"main-form",
                                'accept-charset'=>"UTF-8"

            ]) }}
                {!! FormTemplate::show($elements) !!}
                {!! Form::close() !!}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="thumb" class="control-label col-md-3 col-sm-3 col-xs-12">Thumb</label>--}}
{{--                        <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--                            <input class="form-control col-md-6 col-xs-12" name="thumb" type="file" id="thumb">--}}
{{--                            <p style="margin-top: 50px;"><img src="http://proj_news.xyz/images/slider/LWi6hINpXz.jpeg"--}}
{{--                                                              alt="Ưu đãi học phí" class="zvn-thumb"></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="ln_solid"></div>--}}
                <div class="x_content">
                </div>
            </div>
        </div>
        <!--end-box-lists-->
        <!--box-pagination-->
@endsection
