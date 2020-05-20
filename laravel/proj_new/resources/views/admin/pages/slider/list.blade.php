<?php

use  App\Helpers\Template as Template;
use  App\Helpers\Hightlight as Hightlight;
use App\Http\Controllers\SliderController;

?>
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
        <tr class="headings">
            <th class="column-title">#</th>
            <th class="column-title">Name</th>
            <th class="column-title">Description</th>
            <th class="column-title">Thumb</th>
            <th class="column-title">Status</th>
            <th class="column-title">Created</th>
            <th class="column-title">Modified</th>
            <th class="column-title">Action</th>
        </tr>
        </thead>
        <tbody>
        @if (count($items) >0)
            @foreach($items as $key=> $value)
                @php
                    $index           = $key +1;
                    $id              = $value['id'];
                    $name            = Hightlight::show($value['name'],$params['search'],'name');
                    $description     = Hightlight::show($value['description'],$params['search'],'description');
                  //  $description     = $value['description'];
                    $link            = $value['link'];
                    $thumb           = $value['thumb'];
                    $created         = $value['created'];
                    $created_by      = $value['created_by'];
                    $modified        = $value['modified'];
                    $modified_by     = $value['modified_by'];
                    $thumb           = Template::showItemImage($controllerName,$value['thumb'],$value['name']);
                    $createHistory   = Template::showItemHistory($created,$created_by);
                    $modifyHistory   = Template::showItemHistory($modified,$modified_by);
                    $status          = Template::showItemStatus($controllerName,$id,$value['status']);
                    $listButtonAction= Template::showActionbutton($controllerName,$id);
                    $class = ( $index %2 ==0) ? 'even': 'odd';
                @endphp
                <tr class="{{$class}} pointer">
                    <td class="">{{$index}}</td>
                    <td width="12%">{!! $name !!} <br>

                                 {!! $link !!}

                    </td>
                    <td>   {!! $description !!}</td>
                    <td width="5%">
                    <p>{!! $thumb !!}</p>
                    </td>
                    <td>{!!$status !!}</td>
                    <td>{!!$createHistory !!}</td>
                    <td>{!!$modifyHistory !!}</td>
                    <td class="last">{!! $listButtonAction !!}</td>
                </tr>
            @endforeach
        @else
            @include('admin.templates.list_empty',['colspan'=>11])
        @endif
        </tbody>
    </table>
</div>
</div>
