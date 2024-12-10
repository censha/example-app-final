<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\News;

use App\Models\Headings;
use Illuminate\Support\Facades\DB;

use Butschster\Head\Facades\Meta;
use App\Models\MetaTags;

use Illuminate\Http\Request;

class BlogNewsController extends Controller
{/*
select nn.* , json_object_agg(concat(tt.id), tt.name) as sa from newsapp_news nn 
join newsapp_news_tags nnt on nn.id = nnt.news_id
join tagsapp_tags tt on tt.id = nnt.tags_id
group by nn.id;
*/
    public function index($category = null){

        if(MetaTags::where('page', 'B')->select('seo_description')->first())
        Meta::setDescription(MetaTags::where('page', 'B')->select('seo_description')->first()->seo_description);
        else Meta::setDescription('meta');
        if(MetaTags::where('page', 'B')->select('seo_keywords')->first())
        Meta::setKeywords(MetaTags::where('page', 'B')->select('seo_keywords')->first()->seo_keywords);
        else Meta::setKeywords('meta');

        $news = DB::table('newsapp_news')
        //orderBy('id', 'DESC')
        //join('newsapp_news_tags', 'newsapp_news_tags.news_id', '=', 'newsapp_news.id')
        //->join('tagsapp_tags', 'tagsapp_tags.id', '=', 'newsapp_news_tags.tags_id')
            ->leftJoin('newsapp_news_tags', function ($join) { $join->on('newsapp_news_tags.news_id', '=', 'newsapp_news.id')
            ->join('tagsapp_tags', 'tagsapp_tags.id', '=', 'newsapp_news_tags.tags_id'); })

            // $tags = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')
            // ->where('videosapp_video_tags.video_id', $id)
            // ->get();


        ->select(
            DB::raw(
                //'newsapp_news.*',
                //'tagsapp_tags.name as tags',
                'json_object_agg(concat(tagsapp_tags.id), tagsapp_tags.name) as tags'
            ),
            DB::raw('newsapp_news.*')
        )
        ->groupBy('newsapp_news.id')
        ->orderBy('id', 'DESC')
        ->paginate(4);
            
    
        // $tags =  DB::table("newsapp_news_tags")
                //->where('tags_id', $news->id)->get();
        //$tags = DB::table('newsapp_news_tags')->get();
        $headings = Headings::all();
        //dd($headings);   
        $main = News::where('main', true)->get();
        
        // Для сортировки категорий
        if($category)
        $news = DB::table('newsapp_news')
        //orderBy('id', 'DESC')
        //join('newsapp_news_tags', 'newsapp_news_tags.news_id', '=', 'newsapp_news.id')
        //->join('tagsapp_tags', 'tagsapp_tags.id', '=', 'newsapp_news_tags.tags_id')
            ->leftJoin('newsapp_news_tags', function ($join) { $join->on('newsapp_news_tags.news_id', '=', 'newsapp_news.id')
            ->join('tagsapp_tags', 'tagsapp_tags.id', '=', 'newsapp_news_tags.tags_id'); })

            // $tags = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')
            // ->where('videosapp_video_tags.video_id', $id)
            // ->get();


        ->select(
            DB::raw(
                //'newsapp_news.*',
                //'tagsapp_tags.name as tags',
                'json_object_agg(concat(tagsapp_tags.id), tagsapp_tags.name) as tags'
            ),
            DB::raw('newsapp_news.*')
        )
        ->groupBy('newsapp_news.id')
        ->where('category_id', $category)
        ->orderBy('id', 'DESC')
        ->paginate(4);

        //dd($news);
        return Inertia::render('Blog_News_View',[
            'news' => $news,
            'headings' => $headings,
            'mains' => $main
        ]);
    }
}
