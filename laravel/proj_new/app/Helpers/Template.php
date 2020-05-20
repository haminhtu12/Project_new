<?php
namespace App\Helpers;
use Config;

class Template
{

    public static function showItemHistory($time, $by)
    {
        $times = date(Config::get('zvn.format.short_time'), strtotime($time));
        $xhtml = "
        <p>$times</p>
        <p>$by</p>

";
        return $xhtml;
    }

    public static function showItemStatus($controllname, $id, $statusValue)
    {
        $tmpStatus = config::get('zvn.template.status');
//        $statusValue =array_key_exists($item['status'],$tmpStatus) ? $statusValue: 'default';
//        $currentTemplateStatus = $tmpStatus[$statusValue];
//
        $statusValue =array_key_exists($statusValue,$tmpStatus) ? $statusValue: 'default';
        $currentTemplateStatus = $tmpStatus[$statusValue];
        $link = route($controllname . '/status', ['status' => $statusValue, 'id' => $id]);
        $xhtml = sprintf("
                           <a href='%s' ,type ='button',class='btn btn-round %s '>%s
                           </a>", $link, $currentTemplateStatus['class'], $currentTemplateStatus['name']
        );
        return $xhtml;
    }

    public static function showItemImage($controllname, $thumbName, $thumbAlt)
    {
        $xhtml = sprintf("
        <img src='%s' alt='%s'>", asset("images/$controllname/$thumbName"), $thumbAlt);
        return $xhtml;
    }

    public static function showActionbutton($controllname,$id)
    {
        $tmpButton = Config::get('zvn.template.button');

        $buttonArea = Config::get('zvn.config.button');


        // $controll = (array_key_exists($controllname,$buttonArea))?$controllname :'default';
        $listButton = $buttonArea[$controllname];
        $xhtml = "<div class='zvn-box-btn-filter'>";

        foreach ($listButton as $k => $v){
            $cunrentButton = $tmpButton[$v];
            $link = route($controllname.$cunrentButton['router-name'],['id'=>$id]);
            $xhtml .= sprintf("
                                            <a href='%s'
                                type='button' class='btn btn - icon %s btn-delete' data-toggle='tooltip'
                                data-placement='top' data-original-title='%s'>
                                <i class='fa %s'></i>
                            </a>
                ",$link,$cunrentButton['class'],$cunrentButton['title'],$cunrentButton['icoin']);
        }
        $xhtml.= "</div>";
        return $xhtml;
    }
    public static function showButtonFileter($controllername,$itemsStatusCount,$paramSearch)
    {
        $xhtml = null;
        $tmpstatus = config::get('zvn.template.status');
        // $itemsStatusCount  = [['count','status']]
        $all['status'] = 'All';
        $all['count'] = array_sum(array_column($itemsStatusCount,'count'));
        array_unshift($itemsStatusCount,$all);

        foreach ($itemsStatusCount as $item){ //item = [count,status]
            $StatusValue = $item['status'];
            $StatusValue = array_key_exists($StatusValue,$tmpstatus) ? $StatusValue:'default';
            $curentStatus = $tmpstatus[$StatusValue];
            $link = route($controllername)."?filter_status=".$StatusValue;
            if ($paramSearch['value'] != ''){
                $link.= '&search_filed='.$paramSearch['field'] .'&search_value='.$paramSearch['value'];
            }
            if ($StatusValue=='active'){
                $class = 'btn-primary';
            }elseif ($StatusValue=='inactive'){
                $class = 'btn-success';
            }else  $class = 'btn-warning';
            $xhtml.= sprintf("<a href =%s type='button' class='btn $class'>
                                    %s <span class='badge bg-white'>%s</span></a>

            ",$link,$curentStatus['name'],$item['count']);
        }
        return $xhtml ;
    }
    public static function showAreasearch($controllername,$paramSearch)
    {
        $templateFiled     = Config::get('zvn.template.search'); //
//            'all'       =>['name'=>'Search by All'],
//            'id'        =>['name'=>'Search by ID'],
//            'name'      =>['name'=>'Search by Name'],
//            'user'      =>['name'=>'Search by FullName'],
//            'fullname'  =>['name'=>'Search by Fullname'],
//            'email'     =>['name'=>'Search by Email'],
//            'description'=>['name'=>'Search by Description'],
//            'link'      =>['name'=>'Search by Link'],
//            'content'   =>['name'=>'Search by Content']

        $fieldInController = Config::get('zvn.config.search'); //'slider' =>['all','link','description'],
        //'default'=>['all','id','fullname']
        $xhtmlField = null;
        $xhtml = null;
        $controllername = array_key_exists($controllername,$fieldInController) ? $controllername :'default';
        foreach ($fieldInController[$controllername] as $filed){ //$filed = all','link','description
            $xhtmlField.= sprintf("<li><a class='select-field' data-field='%s'>%s</a></li>",$filed,$templateFiled[$filed]['name']);
        }
        $searchValue = $paramSearch['value'];
        $searchField=  in_array($paramSearch['field'],$fieldInController[$controllername])? $paramSearch['field']: 'all';

        $xhtml= sprintf("                            <div class='input-group'>
                                <div class='input-group-btn'>
                                    <button type='button'
                                            class='btn btn-default dropdown-toggle btn-active-field' data-toggle='dropdown' aria-expanded='false'>
                                        %s <span class='caret'></span>
                                    </button>
                                    <ul class='dropdown-menu dropdown-menu-right' role='menu'>
                                        %s
                                    </ul>
                                </div>


                                 <input type='text'    name='search_value' value='%s' class='form-control'>
                                 <input type='hidden'  name='search_field' value='%s'>

                                <span class='input-group-btn'>
                        <button id='btn-clear-search' type='button' class='btn btn-success'
                                style='margin-right: 0px'>Xóa tìm kiếm</button>
                        <button id='btn-search' type='button' class='btn btn-primary'>Tìm kiếm</button>
                        </span>
                            </div>
",$templateFiled[$searchField]['name'],$xhtmlField,$searchValue,$searchField);
        return $xhtml ;
    }
}
