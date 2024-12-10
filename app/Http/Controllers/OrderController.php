<?php

namespace App\Http\Controllers;
use App\Mail\FeedbackMailer;
use App\Mail\OrderShipped;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    //
    public function orderPhoto(Request $request){
        Mail::to($request->user())->send(new OrderShipped());
//        Orders::create([
//            'answer' => false,
//            'bayer_email' => $request->email,
//            'bayer_name' => $request->name,
//            'bayer_phone' => $request->numder,
//            'photo_id' =>$request->photo,
//            'photocollectiion_id' => null,
//            'user_id' => auth()->user()->id,
//        ]);

    }

    public function orderPhotoCollection(Request $request){
        $orders =  Orders::create([
            'answer' => false,
            'bayer_email' => $request->email,
            'bayer_name' => $request->name,
            'bayer_phone' => $request->numder,
            'photo_id' => null,
            'photocollectiion_id' => $request->photo,
            'user_id' => auth()->user()->id,
        ]);
        Mail::to($request->user())->send(new OrderShipped($orders));
    }

    public function ordertrete(Request $request){
        Mail::to($request->user())->send(new OrderShipped());
    }
}

