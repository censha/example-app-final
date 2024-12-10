<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Photo;
use App\Models\PhotoCollection;
use App\Models\Tags;
use App\Models\VideoCollection;
use App\Models\VideoTheme;
use App\Models\VideoType;
use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(){
        $films = Film::where('status', 'P')->paginate(24);
        $tagfilms = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')->get();
        //dd( $films ,PhotoCollection::all());
        return Inertia::render('SearchNewView',[
            'films' => $films,
            'tags' => Tags::all(),
            'news' => News::all(),
            'themes' => VideoTheme::all(),
            'types' => VideoType::all(),
            'collections'=> VideoCollection::all(),
            'lastFilms' => Film::orderByDesc('id')->limit(6)->get(),
            'tagfilms' => $tagfilms,
            'photocollection' => PhotoCollection::all(),
            'photo' => Photo::all()
        ]);
    }

    public function searchs($cat, $data = null){
        $films = Film::where('status', 'P')->paginate(24);
        $tagfilms = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')->get();
        //if($data){
            if($cat == 'video'){
                $films = Film::where('status', 'P')->where('video_name', 'ilike', '%' .$data. '%')->orWhere('annotation', 'ilike', '%' .$data. '%')->paginate(24);
                $photocollection = '';
                $photo = '';
                $news = '';
            }
            if($cat == 'photo'){
                $photocollection = PhotoCollection::where('name', 'ilike', '%' .$data. '%')->orWhere('content', 'ilike', '%' .$data. '%')->get();
                $photo = Photo::where('name', 'ilike', '%' .$data. '%')->paginate(24);
                $films = '';
                $news = '';
            }
            if($cat == 'news'){
                $films = '';
                $photocollection = '';
                $photo = '';
                $news = News::where('name', 'ilike', '%' .$data. '%')->orWhere('content', 'ilike', '%' .$data. '%')->paginate(24);
            }
        return Inertia::render('SearchNewView',[
            'films' => $films,
            'news' => $news,
            'tags' => Tags::all(),
            'themes' => VideoTheme::all(),
            'types' => VideoType::all(),
            'collections'=> VideoCollection::all(),
            'lastFilms' => Film::orderByDesc('id')->limit(6)->get(),
            'tagfilms' => $tagfilms,
            'photocollection' => $photocollection,
            'photo' => $photo,
            'cat' => $cat,
            'datasearch' =>$data,
        ]);
    }

    public function searchdata(Request $request){
        return redirect()->route('searchs', [ $request->cat, $request->searched ]);
    }

    public function searchtags($data){
        $films = Film::join('videosapp_video_tags','videosapp_video_tags.video_id', '=', 'videosapp_video.id')
            ->join('tagsapp_tags','tagsapp_tags.id', '=', 'videosapp_video_tags.tags_id')
            ->where('videosapp_video.status', 'P')
            ->where('tagsapp_tags.name', 'ilike', $data)
            ->select('videosapp_video.*')
            ->paginate(24);
        $news = News::join('newsapp_news_tags','newsapp_news_tags.news_id', '=', 'newsapp_news.id')
            ->join('tagsapp_tags','tagsapp_tags.id', '=', 'newsapp_news_tags.tags_id')
            ->where('tagsapp_tags.name', 'ilike', $data)
            ->select('newsapp_news.*')
            ->get();
        $tagfilms = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')->get();
        //dd($films, $news);
        return Inertia::render('SearchNewView',[
            'films' => $films,
            'news' => $news,
            'tags' => Tags::all(),
            'themes' => VideoTheme::all(),
            'types' => VideoType::all(),
            'collections'=> VideoCollection::all(),
            'lastFilms' => Film::orderByDesc('id')->limit(6)->get(),
            'tagfilms' => $tagfilms,
            //'photocollection' => $photocollection,
            //'photo' => $photo,
            //'cat' => $cat,
            'tagtags' => $data

        ]);
    }
}
