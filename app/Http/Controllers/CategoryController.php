<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $cat_list = \DB::table('categories')->select('id','category','deleted')->get();

        return view('category.index')->with('cat', $cat_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $cat_list = \DB::table('categories')->select('id','category')->get();

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cat = new category;

        $cat->category = $request->input('category');


        $cat->deleted = 0;

        $cat->save();

        return \Redirect::to('cat');
    }

    public function delete(Request $request)
    {
        $delete_id = $request->input('invisible');

        \DB::table('categories')
            ->where("categories.id", '=',  $delete_id)
            ->update(['deleted'=> 1]);
        return \Redirect::to('cat');
    }
    public function undo(Request $request)
    {
        $delete_id = $request->input('invisible');
        \DB::table('categories')
            ->where("categories.id", '=',  $delete_id)
            ->update(['deleted'=> 0]);
        return \Redirect::to('cat');
    }
}
