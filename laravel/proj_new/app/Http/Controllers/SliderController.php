<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel as MainModel;


class SliderController extends Controller
{
    private $pathViewController = 'admin.pages.slider.';
    private $controllerName = 'slider';
    private $model;
    private $params = [];

    public function __construct()
    {
        $this->model = new  MainModel();
        $this->params['pagination']['totalItemPerPage'] = 5;
        View()->share('controllerName', $this->controllerName);

    }

    public function index(Request $request)
    {
         $this->params['filter']['status'] = $request->input('filter_status','all') ;
         $this->params['search']['field']  = $request->input('search_filed','') ;
         $this->params['search']['value']  = $request->input('search_value','') ;
         $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $itemsStatusCount = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);//[['status','count']x3]
        return view($this->pathViewController . 'index', [
            'items' => $items,
            'itemsStatusCount'=>$itemsStatusCount,
            'params'=>$this->params
        ]);
    }

    public function form($id = null,Request $request)
    {

        $item = null;
        if ($request->id != null){
            $param['id'] = $request->id;
            $item = $this->model->getItem($param);
        }

        return view($this->pathViewController . 'form',[
        'item'=>$item
        ]);

    }

    public function status(Request $request)
    {
        $statusValue = $request->status;
        $idValue = $request->id;
        $this->model::changestatus($idValue,$statusValue);
        return redirect()->route($this->controllerName)->with('status', 'Profile updated!');

    }

    public function delete($id ,Request $request)
    {

        $idValue = $request->id;
        $this->model::deleteItemp($idValue);
        return redirect()->route($this->controllerName)->with('status', 'Delete Success!');


    }
    public function save(Request $request){
        $validateData = $request ->validate([
            'name'=>  'required|min:3',
            'link'=>  'bail|required|min:3|url',
        ]);


    }
}
