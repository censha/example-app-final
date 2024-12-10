<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Models\MetaTags;
class NewsController extends Controller
{
    public function show($id){
        if(News::where('id', $id)->select('seo_description')->first()->seo_description)
        Meta::setDescription(News::where('id', $id)->select('seo_description')->first()->seo_description);
        else Meta::setDescription(News::where('id', $id)->select('name')->first()->name);
        Meta::setKeywords(News::where('id', $id)->select('seo_keywords')->first()->seo_keywords);

        $main = News::where('id', '!=', $id)->limit(3)->get();
        return inertia('NewsPageView', [
            'news' => News::find($id),
            'main' => $main
        ]);
    }
}
