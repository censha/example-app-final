<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;





class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function  user_data(Request $request){
        $id = auth()->user()->id;
        $user = User::find($id);
    // dd($user_data);

    if($user=User::find($id)){
        return inertia('Header',[
            'user_data' => $user
        ]);
        }}
}
