<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Photo;
use App\Models\PhotoCollection;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Butschster\Head\Facades\Meta;
use App\Models\MetaTags;

class PhotoController extends Controller
{
    public function index(){


        if(MetaTags::where('page', 'P')->select('seo_description')->first())
        Meta::setDescription(MetaTags::where('page', 'P')->select('seo_description')->first()->seo_description);
        else Meta::setDescription('meta');
        if(MetaTags::where('page', 'P')->select('seo_keywords')->first())
        Meta::setKeywords(MetaTags::where('page', 'P')->select('seo_keywords')->first()->seo_keywords);
        else Meta::setKeywords('meta');


        $photocollection = PhotoCollection::where('status','P')->orderBy('id', 'desc')->limit(7)->get();
        $photo = PhotoCollection::where('status','P')->paginate(24);
        //dd($photocollection);
        return Inertia::render('PhotoAlbumView',[
            'photocollections' => $photocollection,
            'photos' => $photo,
        ]);
    }

    public function show($id){
        if(PhotoCollection::where('id', $id)->select('seo_description')->first()->seo_description)
        Meta::setDescription(PhotoCollection::where('id', $id)->select('seo_description')->first()->seo_description);
        else Meta::setDescription(PhotoCollection::where('id', $id)->select('name')->first()->name);
        Meta::setKeywords(PhotoCollection::where('id', $id)->select('seo_keywords')->first()->seo_keywords);

        $photos = Photo::where('photo_collections_id', $id)->get();
        if(auth()->user()){
            $order = Orders::where('user_id', auth()->user()->id)
                ->select([
                    'bayer_email',
                    'bayer_name',
                    'bayer_phone',
                ])
                ->latest()
                ->first();
        }
            if(!auth()->user() || $order == null){
                $order = ([
                    'bayer_email' => '',
                    'bayer_name' => '',
                    'bayer_phone' => '',
                ]);
            }
        //dd($order);
        $photocollection = PhotoCollection::find($id);
        return Inertia::render('PhotoAlbum', [
            'order' => $order,
            'photos' => $photos,
            'photocollection' => $photocollection
        ]);
    }


    public function  showphoto($id){
        if(Photo::where('id', $id)->select('seo_description')->first()->seo_description)
        Meta::setDescription(Photo::where('id', $id)->select('seo_description')->first()->seo_description);
        else Meta::setDescription(Photo::where('id', $id)->select('name')->first()->name);
        Meta::setKeywords(Photo::where('id', $id)->select('seo_keywords')->first()->seo_keywords);
        if(auth()->user()){
        $order = Orders::where('user_id', auth()->user()->id)
            ->select([
                'bayer_email',
                'bayer_name',
                'bayer_phone',
            ])
            ->latest()
            ->first();
    }
        if(!auth()->user() || $order == null){
            $order = ([
                'bayer_email' => '',
                'bayer_name' => '',
                'bayer_phone' => '',
            ]);
        }
        $photocollection = PhotoCollection::find(Photo::find($id)->photo_collections_id);

        $photos = Photo::whereNot('id', $id)
            ->where('photo_collections_id', $photocollection->id)
            ->get();
            $photo = Photo::where('photoapp_photo.id', $id)
                ->join('authorsapp_authors', 'authorsapp_authors.id', '=', 'photoapp_photo.author_hoto_id')
                ->select(
                    'photoapp_photo.*',
                    'authorsapp_authors.name as author_name',
                    'authorsapp_authors.last_name as author_last_name'
                )
                ->first();
            if(!$photo)
            $photo = Photo::where('id', $id)
                ->first();
        //dd($photo);
        return Inertia::render('PhotoView', [
            'order' => $order,
            'photo' => $photo,
            'photos' =>  $photos,
            'photocollection' => $photocollection]);

    }


    public function albomshow($id){
        $photos = Photo::where('photo_collections_id', $id)->paginate(24);
        //dd($photos);

        return Inertia::render('PhotosOfAlbumView',[ 'photos' => $photos ]);
    }



}
