<?php

return [

    'prefix_admin' => 'admin123',
    'format'=>[
        'long_time'=>'H:m:s d/m/Y',
        'short_time'=>'d/m'
    ],
    'template'=>[
        'form_input'=>[
            'class'=>'form-control col-md-6 col-xs-12',
                    ],
        'form_label'=>[
            'class'=>'control-label col-md-3 col-sm-3 col-xs-12',
                    ],
        'status'=>[
            'All'      => ['name'   =>'All','class' => 'btn-success'],
            'active'   => ['name'   => 'Active',   'class' => 'btn-success'],
            'inactive' => ['name'   => 'Inactive', 'class' => 'btn-info'],
            'block'    => ['name'   => 'Lock', 'class' => 'btn-danger'],
            'default'  => ['name'   => 'not define', 'class' => 'btn-info'],
        ],
        'search'=>[
            'all'       =>['name'=>'Search by All'],
            'id'        =>['name'=>'Search by ID'],
            'name'      =>['name'=>'Search by Name'],
            'user'      =>['name'=>'Search by FullName'],
            'fullname'  =>['name'=>'Search by Fullname'],
            'email'     =>['name'=>'Search by Email'],
            'description'=>['name'=>'Search by Description'],
            'link'      =>['name'=>'Search by Link'],
            'content'   =>['name'=>'Search by Content']
        ],
        'button'=>[
            'edit' => [
                'class' => 'btn-success',
                'title' => 'edit',
                'icoin' => 'fa-pencil',
                'router-name' =>   '/form'
            ],
            'delete' => [
                'class' => 'btn-danger',
                'title' => 'delete',
                'icoin' => 'fa-trash',
                'router-name' => '/delete'
            ],
            'info' => [
                'class' => 'btn-info',
                'title' => 'View',
                'icoin' => 'fa-pencil',
                'router-name' => '/delete'
            ],

        ],
],

    'config'=> [
        'search'=>[
            'slider'=>['all','name','description','id','link'],
            'default'=>['all','id','fullname']
        ],
        'button'=>[
            'default' => ['edit','delete'],
            'slider' =>  ['edit','delete']
        ]
    ]

];
