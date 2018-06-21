<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserServiceController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::user()->id;
        $service_list = \DB::table('services')
            ->join('items', 'items.id', '=', 'services.connection_id')
            ->join('service_types', 'service_types.id', '=', 'services.service_type')
            ->select('services.*', 'items.name as item_name', 'service_types.type', 'items.location_id as userID')
            ->where('services.deleted', '=', '0')
            ->get();


//        var_dump($item_list);
//        die;

        return view('userservice.userindex')->with(['service_list' => $service_list, 'userID' => $userId]);
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
        return view('userservice.usereditstate')->with(['service_type' => $service_type, 'selectedService'=> $service_list[0]]);
    }
    public function savestate(Request $request)
    {
        $selected_id = $request->input('invisibleID');
        $statenx = $request->input('servicetype');
        \DB::table('services')
            ->where("services.id", '=',  $selected_id)
            ->update(['service_type'=>$statenx]);
        return \Redirect::to('userservice');
    }
}
