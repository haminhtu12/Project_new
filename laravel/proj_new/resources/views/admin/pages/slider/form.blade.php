@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template as Template;
    $formInputClass = config('zvn.template.form_input.class');
    $formLabelClass = config('zvn.template.form_label.class');
    $nameInput = Form::text( 'name', $item['name'],['class' => $formInputClass]);
    $inputHiddenId = Form::hidden( 'id', $item['id']);
    $inputHiddenThumb = Form::hidden( 'thumb_current', $item['thumb']);
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
            'element'=> Form::text( 'description', $item['description'],['class' => $formInputClass])
            ],
        [
            'label'=> Form::label('status', 'status',  ['class'  => $formLabelClass]),
            'element'=> Form::select('status', $statusValue,  $item['status'], ['class' => $formInputClass])
            ],
             [
            'label'=> Form::label('link', 'Link ',  ['class'  => $formLabelClass]),
            'element'=> Form::text( 'link', $item['link'],['class' => $formInputClass])
            ],
             [
            'label'=> Form::label('thumb', 'Thumb ',  ['class'  => $formLabelClass]),
            'element'=>Form::file('thumb', ['class'  => $formInputClass]),
            'thumb'=> (!empty($item['id'])) ? Template::showItemImage($controllerName,$item['thumb'],$item['name']) :null,
            'type'=> 'thumb',
            ],
            [
            'element'=> $inputHiddenId.$inputHiddenThumb.  Form::submit('Save', [ 'class' => 'btn btn-success'] ),
             'type'=> 'btn-submit',
            ],

];
@endphp
@section('content')
    @include('admin.templates.page_header',['pageIndex' =>false])
    @include('admin.templates.error')
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


                <div class="x_content">
                </div>
            </div>
        </div>
        <!--end-box-lists-->
        <!--box-pagination-->
@endsection
