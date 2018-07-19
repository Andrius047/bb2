<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $service_list = \DB::table('services')
            ->join('items', 'items.id', '=', 'services.connection_id')
            ->join('service_types', 'service_types.id', '=', 'services.service_type')
            ->join('users', 'users.id', '=', 'items.location_id')
            ->select('services.*', 'items.name as item_name', 'service_types.type','users.name as user')
            ->where('services.deleted', '=', '0')
            ->get();


//        var_dump($service_list);
//        die;
//        die;

        return view('service.index')->with('service_list', $service_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = \DB::table('items')
            ->select('items.*')
            ->where('items.deleted', '=', '0')
            ->orderBy('items.id', 'desc')
            ->get();

        $service_type = \DB::table('service_types')->select('service_types.id', 'service_types.type')
            ->where('service_types.deleted', '=', '0')
            ->get();

        return view('service.create')->with(['items' => $items, 'service_type' => $service_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new service;

        $service->name = $request->input('name');
        $service->description = $request->input('desc');

        $date = explode('/', $request->input('date'));
        $date = $date[2].'-'. $date[0].'-'.$date[1];

        $service->date = $date;
        $service->connection_id = $request->input('item');
        $service->service_type = $request->input('servicetype');
        $service->repeat = $request->input('repeat');
//        $something =  \DB::table('categories')->join('item_models', 'categories.id', '=', 'item_models.category_id')->where('item_models.id', $item->model_id)->select('categories.id')->get();
//        $item->location_id =  $something[0]->id;

        $service->deleted = 0;

        $service->save();

        return \Redirect::to('service');
    }

    public function saveedit(Request $request)
    {
        $service = new service;
        $selected_id = $request->input('invisibleID');
        $service->name = $request->input('name');
        $service->description = $request->input('desc');

        $date = explode('/', $request->input('date'));
        $date = $date[2].'-'. $date[0].'-'.$date[1];

        $service->date = $date;
        $service->connection_id = $request->input('item');
        $service->service_type = $request->input('servicetype');
        $service->repeat = $request->input('repeat');
//        $something =  \DB::table('categories')->join('item_models', 'categories.id', '=', 'item_models.category_id')->where('item_models.id', $item->model_id)->select('categories.id')->get();
//        $item->location_id =  $something[0]->id;
        $service->deleted = 0;
//        var_dump(\DB::table('services')
//            ->where("services.id", '=',  $selected_id)
//            ->update(['deleted'=> 0, 'name'=>$service->name, 'description'=>$service->description, 'date'=>$service->date, 'connection_id'=>$service->connection_id, 'service_type'=>$service->service_type, 'repeat'=>$service->repeat]));
//        die;
        \DB::table('services')
            ->where("services.id", '=',  $selected_id)
            ->update(['deleted'=> 0, 'name'=>$service->name, 'description'=>$service->description, 'date'=>$service->date, 'connection_id'=>$service->connection_id, 'service_type'=>$service->service_type, 'repeat'=>$service->repeat]);
//
//        $item->save();

        return \Redirect::to('service');
    }


    public function editstate($id)
    {
        $service_list = \DB::table('services')
            ->select('service_type', 'id')
            ->where('id', '=', $id)
            ->get();
        $service_type = \DB::table('service_types')->select('service_types.id', 'service_types.type')
            ->where('service_types.deleted', '=', '0')
            ->get();
        return view('service.editstate')->with(['service_type' => $service_type, 'selectedService'=> $service_list[0]]);
    }

    public function savestate(Request $request)
    {
        $selected_id = $request->input('invisibleID');
        $state = $request->input('servicetype');
        \DB::table('services')
            ->where("services.id", '=',  $selected_id)
            ->update(['service_type'=>$state]);
        return \Redirect::to('service');
    }

    public function edit($id)
    {

        $items = \DB::table('items')
            ->select('items.*')
            ->where('items.deleted', '=', '0')
            ->orderBy('items.id', 'desc')
            ->get();

        $service_type = \DB::table('service_types')->select('service_types.id', 'service_types.type')
            ->where('service_types.deleted', '=', '0')
            ->get();


        $service_list = \DB::table('services')
            ->select('id', 'name', 'description', 'date', 'connection_id', 'service_type', 'repeat')
            ->where('deleted', '=', '0', 'AND', 'id', '=', $id)
            ->get();

        /*$categories = \DB::table('categories')
            ->join('item_models', 'categories.id', '=', 'item_models.category_id')
            ->select('categories.*', 'item_models.*')
            ->orderBy('categories.category', 'desc')
            ->get();

        $user_list = \DB::table('users')->select('users.id', 'users.username')
            ->get();
        $selected_item = \DB::table('items')
            ->select('id', 'name', 'description', 'location_id', 'model_id')
            ->where('id', '=', $id)->get();*/
        return view('service.edit')->with(['service_type' => $service_type, 'items' => $items, 'selectedService'=> $service_list[0]]);
//        $edit_id = $request->input('invisible');
//        var_dump("tai vat turime sita suda ".$id);die;
//
//        \DB::table('categories')
//            ->where("categories.id", '=',  $delete_id)
//            ->update(['deleted'=> 1]);
//        return \Redirect::to('cat');
    }
    
    public function delete(Request $request)
    {
        $delete_id = $request->input('invisible');

        \DB::table('services')
            ->where("services.id", '=',  $delete_id)
            ->update(['deleted'=> 1]);
        return \Redirect::to('service');
    }
}
