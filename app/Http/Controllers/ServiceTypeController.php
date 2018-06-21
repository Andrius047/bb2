<?php

namespace App\Http\Controllers;

use App\service_type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceTypeController extends Controller
{
    //
    public function index()
    {
        $type_list = \DB::table('service_types')->select('id','type')->where("service_types.deleted", '=',  0)->get();

        return view('type.index')->with('type', $type_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $cat_list = \DB::table('categories')->select('id','category')->get();

        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $type = new service_type;

        $type->type = $request->input('type');


        $type->deleted = 0;

        $type->save();

        return \Redirect::to('type');
    }

    public function delete(Request $request)
    {
        $delete_id = $request->input('invisible');

        \DB::table('service_types')
            ->where("service_types.id", '=',  $delete_id)
            ->update(['deleted'=> 1]);
        return \Redirect::to('type');
    }
    public function undo(Request $request)
    {
        $delete_id = $request->input('invisible');
        \DB::table('service_types')
            ->where("service_types.id", '=',  $delete_id)
            ->update(['deleted'=> 0]);
        return \Redirect::to('type');
    }
}
