<?php

namespace App\Http\Controllers;
use App\Mail\FeedbackMailer;
use App\Models\CallBack;
use App\Models\Orders;
use App\Models\Scenarist;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonalController extends Controller
{
    //
    public function personal(){
        $id = auth()->user()->id;
        $user = User::find($id);
        //dd($user);

        // dd($order->get());
        $order = Scenarist::where('user_id',$id);
        $order = $order
            ->join('videosapp_video', 'videosapp_video.id', '=', 'ordersapp_order.film_id')
            ->select(
                'ordersapp_order.id',
                'ordersapp_order.*',
                'videosapp_video.orig_name',
                'videosapp_video.video_name'
            )
            ->orderBy('ordersapp_order.created_at', 'desc')
            ->get();
        $order_photo = Orders::where('user_id',$id)
            ->join('photoapp_photo', 'photoapp_photo.id', '=', 'ordersapp_orderphoto.photo_id')
            ->select(
                'ordersapp_orderphoto.id',
                'ordersapp_orderphoto.*',
                'photoapp_photo.name',
                'photoapp_photo.photo'
            )
            ->orderBy('ordersapp_orderphoto.created_at', 'desc')
            ->get();

        $order_photoalbum = Orders::where('user_id',$id)
            ->join('photoapp_photocollectiions', 'photoapp_photocollectiions.id', '=', 'ordersapp_orderphoto.photocollectiion_id')
            ->select(
                'ordersapp_orderphoto.id',
                'ordersapp_orderphoto.*',
                'photoapp_photocollectiions.name',
                'photoapp_photocollectiions.content',
                'photoapp_photocollectiions.photo_cat'
            )
            ->orderBy('ordersapp_orderphoto.created_at', 'desc')
            ->get();
        //dd($order_photoalbum);
            return inertia('Personal',[
                'user' => $user,
                'orders' => $order,
                'order_photoalbum' =>$order_photoalbum,
                'order_photo' => $order_photo
            ]);



    }

    public function updatePhoto(Request $request){
        $id = auth()->user()->id;
        //dd($request);
        //dd($request->first_name, $request->last_name);
        //$data['avatar'] = $name;
        //dd($request->info);
        User::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'info' => $request->info,
        ]);

        if($request->file('photo')){
            $file = $request->file('photo');
            $name = '/ava/' . uniqid() . '.' . $file->extension();
            $file->move('ava', $name);
            User::find($id)->update([
            'photo' =>  $name,
            ]);
        }

        //dd(User::find($id));

        //return redirect('personal');
        return response()->json(['success' => 'Ok']);

    }

    public function callback(Request $request){
        $id = auth()->user()->id;
        $order = CallBack::create([
            'name' => $request->name_user,
            'company_name' => $request->name_company,
            'phone' => $request->numder,
            'email' => $request->email,
            'content' => $request->content,
            'answer' => false,
            'user_id' => $id,
        ]);
        Mail::to($request->user())->send(new FeedbackMailer($order));

    }
}
