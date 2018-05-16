<?php

namespace App\Http\Controllers;

use App\item_model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    public function index()
    {
        $mod_list = \DB::table('item_models')
            ->join('categories', 'item_models.category_id', '=', 'categories.id')
            ->select('item_models.id', 'item_models.model' ,'categories.category', 'item_models.deleted')
            ->get();

        return view('model.index')->with('mod', $mod_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_list = \DB::table('categories')->select('id','category')->get();

        return view('model.create')->with('cat', $cat_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mod = new item_model;

        $mod->model = $request->input('model');

        $mod->deleted = 0;

        $mod->category_id = $request->input('parent');

        $mod->save();

        return \Redirect::to('mod');
    }

    public function delete(Request $request)
    {
        $delete_id = $request->input('invisible');

        \DB::table('item_models')
            ->where("item_models.id", '=',  $delete_id)
            ->update(['deleted'=> 1]);
        return \Redirect::to('mod');
    }

    public function undo(Request $request)
    {
        $delete_id = $request->input('invisible');
        \DB::table('item_models')
            ->where("item_models.id", '=',  $delete_id)
            ->update(['deleted'=> 0]);
        return \Redirect::to('mod');
    }
}
