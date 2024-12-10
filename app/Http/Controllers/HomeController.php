<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\KinoArchiv;
use App\Models\News;
use App\Models\Photo;
use App\Models\PhotoCollection;
use App\Models\User;
use App\Models\VideoTheme;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Scenarist;

use Butschster\Head\Facades\Meta;
use App\Models\MetaTags;
//use Butschster\Head\Facades\Meta;
//use Meta;

class HomeController extends Controller
{
    public function home(){

        
        if(MetaTags::where('page', 'M')->select('seo_description')->first())
        Meta::setDescription(MetaTags::where('page', 'M')->select('seo_description')->first()->seo_description);
        else Meta::setDescription('meta');
        if(MetaTags::where('page', 'M')->select('seo_keywords')->first())
        Meta::setKeywords(MetaTags::where('page', 'M')->select('seo_keywords')->first()->seo_keywords);
        else Meta::setKeywords('meta');

        $photos = Photo::all();
        $photocollections = PhotoCollection::all();
        $news = News::all();
        $kinos = KinoArchiv::all();
        $themes = VideoTheme::all();
        //dd($kinos);
        //Meta::set('description', 'This is my home. Enjoy!');
        return inertia('HomeView',compact('photos', 'photocollections', 'news', 'kinos', 'themes'));
    }

    // public function personal(){
    //     $id = auth()->user()->id;
    //     $user = User::find($id);
    //     try{
    //         $order = Scenarist::where('user_id',$id);
    //         // dd($order->get());
    //         $order = $order
    //         ->join('videosapp_video', 'videosapp_video.id', '=', 'ordersapp_order.film_id')
    //         ->select(
    //             'ordersapp_order.id',
    //             'ordersapp_order.created_at',
    //             'videosapp_video.orig_name',
    //             'videosapp_video.video_name',
    //         )
    //         ->get();
            
    //         return inertia('Personal',[
    //             'user' => $user,
    //             'orders' => $order,
                
    //         ]);
    //     }
    //     catch(\Throwable $e ){
    //     //  dd($e); 
    //        return inertia('Personal',['user' => $user, 'info' => $e,]);
    //     }
    //     //dd($order);
        
    // }
}
