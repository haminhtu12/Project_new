<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class SliderModel extends Model
{
    protected $table = 'slider';
    // public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $crudNotAccepted = [
        '_token',
        'thumb_current',
        'thumb'
    ];
    public function listItems($params =null, $options=null)
    {
         $fieldSearchAccess =[
             'id',
             'name',
             'description',
             'link',
         ];

        $result = null;
        $value = $params['search']['value'];
        if ($options['task'] == 'admin-list-items') {
            $query  =  $this->select('name', 'id','description','link','thumb','created','created_by','modified','modified_by','status');
            if ( $params['filter']['status'] =='active' || $params['filter']['status'] =='inactive'){
                $query ->where('status','=',$params['filter']['status']);
            }
            if ($params['search']['value']  !=''){
                if($params['search']['field'] =='all'){
                    foreach ($fieldSearchAccess as $colum){
                        $query->orWhere($colum,'like',"%$value%");
                    }
                }else {
                    $query ->where( $params['search']['field'] ,"LIKE","%$value%");
                }
            }
            $result = $query  ->orderBy('id', 'desc')
                              ->paginate($params['pagination']['totalItemPerPage']);
        }
        return $result;
    }
    public  function countItems($params =null, $options=null){
        $result = null;
        $fieldSearchAccess = [
            'id',
            'name',
            'link',
            'description'
        ];

$value = $params['search']['value'];
$fileld =$params['search']['field'];
if ($options['task'] == 'admin-count-items-group-by-status'){
        $query = $this->groupBy('status')
                      ->select(DB::raw('status,COUNT(id) as count'));
        if ($params['search']['value'] != ''){
            if ($params['search']['field'] =='all'){
                foreach ($fieldSearchAccess as $field){
                    $query->orWhere($field,'like',"%$value%");
                }
            }else {
                $query->Where($params['search']['field'] ,'like',"%$value%");
            }
        }
    $result = $query->get()->toArray();
        return $result;
}
    }
    public static function  changestatus($id,$status){

        $status = ($status =='active' )? 'inactive' :'active';
        $affected = DB::table('slider')
            ->where('id', $id)
           ->update(['status' => $status]);
    }
    public  static  function  deleteItemp($id){
        self::where('id', $id)->delete();
    }
    public  function getItem($param){
        $result = self::select('*')->where('id',$param['id'])->first();
        return $result;
    }
    public function saveItem($params = null ,$option = null){
        if ($option['task']=='add -item'){
          //  $params = array_diff_key($params,array_flip($this->crudNotAccepted) );
            $this->name = $params['name'];
            $this->description = $params['description'];
            $this->status = $params['status'];
            $this->link = $params['link'];
            $this->name = $params['name'];
            $this->save();
            echo '<pre style ="color:red">';
            print_r($params);
            echo '</pre>';

        // self::insert($params);




        }
    }
}
