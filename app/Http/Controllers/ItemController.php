<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {
        $item_list = \DB::table('items')
            ->join('item_models', 'item_models.id', '=', 'items.model_id')
            ->join('categories', 'categories.id', '=', 'item_models.category_id')
            ->join('users', 'users.id', '=', 'items.location_id')
            ->select('items.*','categories.category','item_models.model', 'users.username')
            ->where("items.deleted", '=',  0)->get();

//        var_dump($item_list);
//        die;

        return view('item.index')->with('item_list', $item_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \DB::table('categories')
            ->join('item_models', 'categories.id', '=', 'item_models.category_id')
            ->select('categories.*', 'item_models.*')
            ->orderBy('categories.category', 'desc')
            ->get();

        $user_list = \DB::table('users')->select('users.id', 'users.username')
            ->get();

        return view('item.create')->with(['cat' => $categories, 'users' => $user_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new item;

        $item->name = $request->input('name');
        $item->description = $request->input('desc');
        $item->model_id = $request->input('parent');
        $item->location_id = $request->input('user');
//        $something =  \DB::table('categories')->join('item_models', 'categories.id', '=', 'item_models.category_id')->where('item_models.id', $item->model_id)->select('categories.id')->get();
//        $item->location_id =  $something[0]->id;

        $item->deleted = 0;

        $item->save();

        return \Redirect::to('item');
    }

    public function saveedit(Request $request)
    {
        $item = new item;
        $selected_id = $request->input('invisibleID');
        $item->name = $request->input('name');
        $item->description = $request->input('desc');
        $item->model_id = $request->input('parent');
        $item->location_id = $request->input('user');
//        $something =  \DB::table('categories')->join('item_models', 'categories.id', '=', 'item_models.category_id')->where('item_models.id', $item->model_id)->select('categories.id')->get();
//        $item->location_id =  $something[0]->id;
        $item->deleted = 0;
        \DB::table('items')
            ->where("items.id", '=',  $selected_id)
            ->update(['deleted'=> 0, 'name'=>$item->name, 'description'=>$item->description, 'location_id'=>$item->location_id, 'model_id'=>$item->model_id]);
//
//        $item->save();

        return \Redirect::to('item');
    }

    public function edit($id)
    {
        $categories = \DB::table('categories')
            ->join('item_models', 'categories.id', '=', 'item_models.category_id')
            ->select('categories.*', 'item_models.*')
            ->orderBy('categories.category', 'desc')
            ->get();

        $user_list = \DB::table('users')->select('users.id', 'users.username')
            ->get();
        $selected_item = \DB::table('items')
            ->select('id', 'name', 'description', 'location_id', 'model_id')
            ->where('id', '=', $id)->get();
        return view('item.edit')->with(['cat' => $categories, 'users' => $user_list, 'selectedItem'=> $selected_item[0]]);
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

        \DB::table('items')
            ->where("items.id", '=',  $delete_id)
            ->update(['deleted'=> 1]);
        return \Redirect::to('item');
    }
}
