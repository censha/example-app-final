<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;

use Illuminate\Support\Facades\DB;

use App\Models\Film;
use App\Models\MetaTags;

use App\Models\Tags;
use App\Models\VideoTheme;
use App\Models\VideoCollection;
use App\Models\VideoType;
use App\Models\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Actor;
use App\Models\Poster;
use App\Models\Scenarist;
use App\Models\Regeser;
use App\Models\Audio;
use App\Models\License;
use App\Models\Typeuser;

class FilmController extends Controller
{
    public function index(){

        // Meta::prependTitle('LOLOLOLOLOLOL');

        // Meta::setDescription(Film::select('seo_description'));
        // Meta::setDescription(Film::select('seo_keywords'));
        if(MetaTags::where('page', 'V')->select('seo_description')->first())
        Meta::setDescription(MetaTags::where('page', 'V')->select('seo_description')->first()->seo_description);
        else Meta::setDescription('meta');
        if(MetaTags::where('page', 'V')->select('seo_keywords')->first())
        Meta::setKeywords(MetaTags::where('page', 'V')->select('seo_keywords')->first()->seo_keywords);
        else Meta::setKeywords('meta');

        // $films = Film::join('fileapp_filebunner', 'fileapp_filebunner.id', '=', 'videosapp_video.banner_file_id')
        // ->join('fileapp_filebunner_storages', 'fileapp_filebunner_storages.filebunner_id', '=', 'fileapp_filebunner.id')
        // ->join( 'fileapp_storages', 'fileapp_filebunner_storages.storages_id', '=', 'fileapp_storages.id')
        // ->select(
        //     //'fileapp_filevideo.*',
        //     'videosapp_video.*',
        //     'fileapp_storages.prefix',
        //     'fileapp_filebunner.file_path',
        //     'fileapp_filebunner.file_name',
        // )->get();
        //dd($Film::all());
        $films = Film::where('status', 'P')->paginate(24);
        //dd($films);
        $tagfilms = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')->get();
        //dd(Film::all()->paginate(4));

        return Inertia::render('KinoArchiveView', [
           'films' => $films,
           'tags' => Tags::all(),
           'themes' => VideoTheme::all(),
           'types' => VideoType::all(),
           'collections'=> VideoCollection::all(),
           'lastFilms' => Film::where('status','P')->orderByDesc('id')->limit(6)->get(),
           'tagfilms' => $tagfilms,
        ]);
    }

    public function filter(Request $request)
    {
        $films = Film::where('videosapp_video.id', '>', 0);
        $tagfilms = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')->get();
        //return dd($films);
        if($request->input("digitise")){
            switch($request->input("digitise")){
                case '0': break;
                case '1':
                    $films = $films->where('is_digit', true);
                    break;
                case '2':
                    $films = $films->where('is_digit', false);
                    break;
            }

        };
        if($request->input("quality")){
            $quality = explode(",", $request->input("quality"));
            $films = $films->whereIn('quality', $quality);
        }

        if($request->input("issue_year_from")){
            $films = $films->where('date_release', '>' ,$request->input("issue_year_from"));
        }
        if($request->input("issue_year_to")){
            $films = $films->where('date_release', '<' ,$request->input("issue_year_to"));
        }
        if($request->input("chronicle_year_from")){
            $films = $films->where('year_movie', '>' ,$request->input("chronicle_year_from"));
        }
        if($request->input("chronicle_year_to")){
            $films = $films->where('year_movie', '<' ,$request->input("chronicle_year_to"));
        }



        if($request->input("type_kino")){
            $films = $films->where('types_id', $request->input("type_kino"));
        }
        if($request->input("video_collection")){
            $films = $films->where('collections_id', $request->input("video_collection"));
        }
        if($request->input("tems")){
            $films = $films->where('tems_id', $request->input("tems"));
        }
        //return dd($films);
        if($request->input("sort_method")){
            switch($request->input("sort_method")){
                case "date":
                    $films = $films->orderBy('created_at');
                    break;
                case "yearAsc":
                    $films = $films->orderBy('year_movie');
                    break;
                case "yearDesc":
                    $films = $films->orderBy('year_movie', 'desc');
                    break;
            }
        }
        //dd($films);
        //------------Проверка
        $films = $films->where('status', 'P')->paginate(24);
        if($request->input("tags")){
            $tags = explode(",", $request->input("tags"));
            //dd($tags);
            if(count($tags)>0){
                //$films = $films
                //    ->join('videosapp_video_tags', 'videosapp_video_tags.video_id', '=', 'videosapp_video.id')
                //    ->whereIn('videosapp_video_tags.tags_id', $tags)
                //    ->selectRaw("count(videosapp_video_tags.video_id) as counter")
                //    ->groupBy('videosapp_video.id');
                //dd($films->get());
                $films = $films->filter(function($film)use($tags){
                    return DB::table("videosapp_video_tags")
                        ->where('video_id', $film->id)
                        ->whereIn('tags_id', $tags)
                        ->count() > 0;
                });
            }
        }
        return Inertia::render('KinoArchiveView', [
            'films' => $films,
            'tags' => Tags::all(),
            'themes' => VideoTheme::all(),
            'types' => VideoType::all(),
            'collections' => VideoCollection::all(),
            'lastFilms' => Film::where('status','P')->orderBy('id', 'desc')->limit(6)->get(),
            'tagfilms' => $tagfilms,
            'filter'=> [
                'digitise' => $request->input("digitise"),
                'is_digit' => $request->input("is_digit"),
                'quality' => $request->input("quality"),
                'tags' => $request->input("tags"),
                'issue_year_from' => $request->input("issue_year_from"),
                'issue_year_to' => $request->input("issue_year_to"),
                'chronicle_year_from' => $request->input("chronicle_year_from"),
                'chronicle_year_to' => $request->input("chronicle_year_to"),
                'type_kino' => $request->input("type_kino"),
                'video_collection' => $request->input("video_collection"),
                'tems' => $request->input("tems"),
                'sort_method' => $request->input("sort_method"),
                'from' => $request->input("from"),
                'to' => $request->input("to"),
           ]
        ]);
    }

    public function film($id){

        //dd(Film::where('id', $id)->select('seo_description')->first());
        if(Film::where('id', $id)->select('seo_description')->first()->seo_description)
        Meta::setDescription(Film::where('id', $id)->select('seo_description')->first()->seo_description);
        else Meta::setDescription(Film::where('id', $id)->select('video_name')->first()->video_name);
        Meta::setKeywords(Film::where('id', $id)->select('seo_keywords')->first()->seo_keywords);
        $film = Film::leftJoin('videosapp_types', 'videosapp_types.id', '=', 'videosapp_video.types_id')
        ->where('videosapp_video.id',$id)
        ->select(
            'videosapp_video.*',
            'videosapp_types.name as type_film',
        )->first();
        //dd($film);
        // ->join('fileapp_filevideo', 'fileapp_filevideo.id', '=', 'videosapp_video.video_file_id')
        // ->join('fileapp_filevideo_storages', 'fileapp_filevideo_storages.filevideo_id', '=', 'fileapp_filevideo.id')
        // ->join('fileapp_storages', 'fileapp_filevideo_storages.storages_id', '=', 'fileapp_storages.id')
        // ->select(
        //     'fileapp_filevideo.*',
        //     'videosapp_video.*',
        //     'fileapp_storages.prefix',
        //     //'fileapp_filebunner.*'
        // )->first();
        // $banner = Storage::join('fileapp_filebunner_storages', 'fileapp_filebunner_storages.storages_id', '=', 'fileapp_storages.id')
        // ->join('fileapp_filebunner', 'fileapp_filebunner.id', '=', 'fileapp_filebunner_storages.filebunner_id')
        // ->join('videosapp_video', 'videosapp_video.banner_file_id', '=', 'fileapp_filebunner.id' )
        // ->select(
        //     'fileapp_storages.prefix',
        //     'fileapp_filebunner.file_path',
        //     'fileapp_filebunner.file_name',
        // )
        // ->first();
        //dd($tags);
        $licenses = License::all();
        $types = Typeuser::all();


        $tags = Tags::join('videosapp_video_tags', 'videosapp_video_tags.tags_id', '=', 'tagsapp_tags.id')
        ->where('videosapp_video_tags.video_id', $id)
        ->get();
        $actor = Actor::join('videosapp_video_acter', 'videosapp_video_acter.authors_id', '=', 'authorsapp_authors.id')
        ->where('videosapp_video_acter.video_id', $id)
        ->get();
        $operator = Actor::join('videosapp_video_operator', 'videosapp_video_operator.authors_id', '=', 'authorsapp_authors.id')
        ->where('videosapp_video_operator.video_id', $id)
        ->first();
        $produsser = Actor::join('videosapp_video_produser', 'videosapp_video_produser.authors_id', '=', 'authorsapp_authors.id')
        ->where('videosapp_video_produser.video_id', $id)
        ->first();
        $regeser = Actor::join('videosapp_video_regesers', 'videosapp_video_regesers.authors_id', '=', 'authorsapp_authors.id')
        ->where('videosapp_video_regesers.video_id', $id)
        ->first();
//        $scenarist = Actor::join('videosapp_video_scenarist', 'videosapp_video_scenarist.authors_id', '=', 'authorsapp_authors.id')
//        ->where('videosapp_video_scenarist.video_id', $id)
//        ->first();
        $poster = Poster::join('videosapp_video_posters', 'videosapp_video_posters.poster_id', '=', 'postersapp_poster.id')
        ->where('videosapp_video_posters.video_id', $id)
        ->get();
        $audio = Audio::join('videosapp_video_audio_vs_film', 'videosapp_video_audio_vs_film.audio_id', '=', 'audioapp_audio.id')
        ->select(
            'audioapp_audio.*',
            'videosapp_video_audio_vs_film.video_id'
        )
        ->where('videosapp_video_audio_vs_film.video_id', $id)
        ->get();

        $reg = Actor::join('videosapp_video_redactor', 'videosapp_video_redactor.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_redactor.video_id', $id)
            ->get();
        $reg_a = Actor::join('videosapp_video_regesers_anim', 'videosapp_video_regesers_anim.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_regesers_anim.video_id', $id)
            ->get();
        $a_idea = Actor::join('videosapp_video_author_idea', 'videosapp_video_author_idea.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_author_idea.video_id', $id)
            ->get();
        $a_scen = Actor::join('videosapp_video_author_scenarist', 'videosapp_video_author_scenarist.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_author_scenarist.video_id', $id)
            ->get();
        $dictor_txt = Actor::join('videosapp_video_dictor_txt', 'videosapp_video_dictor_txt.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_dictor_txt.video_id', $id)
            ->get();
        $oper = Actor::join('videosapp_video_operator', 'videosapp_video_operator.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_operator.video_id', $id)
            ->get();
        $oper_comb = Actor::join('videosapp_video_operator_comb', 'videosapp_video_operator_comb.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_operator_comb.video_id', $id)
            ->get();
        $xyd = Actor::join('videosapp_video_xydognik', 'videosapp_video_xydognik.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_xydognik.video_id', $id)
            ->get();
        $xyd_a = Actor::join('videosapp_video_xydognik_animatir', 'videosapp_video_xydognik_animatir.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_xydognik_animatir.video_id', $id)
            ->get();
        $k_graph = Actor::join('videosapp_video_komp_graf', 'videosapp_video_komp_graf.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_komp_graf.video_id', $id)
            ->get();
        $mont = Actor::join('videosapp_video_montag', 'videosapp_video_montag.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_montag.video_id', $id)
            ->get();
        $sound_oer = Actor::join('videosapp_video_sound_oper', 'videosapp_video_sound_oper.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_sound_oper.video_id', $id)
            ->get();
        $sound_reg = Actor::join('videosapp_video_sound_reg', 'videosapp_video_sound_reg.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_sound_reg.video_id', $id)
            ->get();
        $komp = Actor::join('videosapp_video_kompozitor', 'videosapp_video_kompozitor.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_kompozitor.video_id', $id)
            ->get();
        $red = Actor::join('videosapp_video_redactor', 'videosapp_video_redactor.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_redactor.video_id', $id)
            ->get();
        $music_red = Actor::join('videosapp_video_mus_red', 'videosapp_video_mus_red.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_mus_red.video_id', $id)
            ->get();
        $xyd_ruk = Actor::join('videosapp_video_xyd_ryk', 'videosapp_video_xyd_ryk.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_xyd_ryk.video_id', $id)
            ->get();
        $dir_film= Actor::join('videosapp_video_dir_film', 'videosapp_video_dir_film.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_dir_film.video_id', $id)
            ->get();
        $prod = Actor::join('videosapp_video_produser', 'videosapp_video_produser.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_produser.video_id', $id)
            ->get();
        $isp_prod = Actor::join('videosapp_video_isp_produser', 'videosapp_video_isp_produser.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_isp_produser.video_id', $id)
            ->get();

        $act = Actor::join('videosapp_video_acter', 'videosapp_video_acter.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_acter.video_id', $id)
            ->get();
        $txt_write = Actor::join('videosapp_video_txt_writer', 'videosapp_video_txt_writer.authors_id', '=', 'authorsapp_authors.id')
            ->where('videosapp_video_txt_writer.video_id', $id)
            ->get();
        if($film->studia_id_id)
        $studia_id = DB::table('studiaapp_studia')->find($film->studia_id_id);
        else $studia_id = null;
        if(auth()->user()){
            $order = DB::table('ordersapp_order')
                ->where('user_id', auth()->user()->id)
                ->select([
                    //'license_id',
                    //'type_used_id',
                    'bayer_email',
                    'bayer_name',
                    'bayer_org_name',
                    'progect_user_name',
                    'bayer',
                    'resident',
                ])
                ->latest()
                ->first();
        }
        if(!auth()->user() || $order == null ){
        $order = ([
            'bayer_email' => '',
            'bayer_name' => '',
            'bayer_org_name' => '',
            'progect_user_name' => '',
            'bayer' => 'IP',
            'resident' => 'true',
        ]);
        }

        //dd($order);

        return Inertia::render('FilmCardView', [
            'film' => $film,
            'tags' => $tags,
            'actors' => $actor,
            'operators' => $operator,
            'produssers' => $produsser,
            'regesers' => $regeser,
           // 'scenarists' => $scenarist,
            'posters' => $poster,
            'audios' => $audio,
            'licenses' => $licenses,
            'types' => $types,
            'reg' => $reg,
            'reg_a' => $reg_a,
            'a_idea' => $a_idea,
            'a_scen' => $a_scen,
            'dictor_txt' => $dictor_txt,
            'oper' => $oper,
            'oper_comb' => $oper_comb,
            'xyd' => $xyd,
            'xyd_a' => $xyd_a,
            'k_graph' => $k_graph,
            'mont' => $mont,
            'sound_oer' => $sound_oer,
            'sound_reg' => $sound_reg,
            'komp' => $komp,
            'red' => $red,
            'music_red' => $music_red,
            'xyd_ruk' => $xyd_ruk,
            'dir_film' => $dir_film,
            'prod' => $prod,
            'isp_prod' => $isp_prod,
            'act' => $act,
            'txt_write' => $txt_write,
            'studia_id' => $studia_id,
            'order' => $order,
        //'banner' =>  $banner
        ]
        );
    }

    public function show($id){
        $film = Film::where('status','P')->find($id)->
        join('fileapp_filevideo', 'fileapp_filevideo.id', '=', 'videosapp_video.video_file_id')
        ->join('fileapp_filevideo_storages', 'fileapp_filevideo_storages.filevideo_id', '=', 'fileapp_filevideo.id')
        ->join('fileapp_storages', 'fileapp_filevideo_storages.storages_id', '=', 'fileapp_storages.id')
        //->join()
        ->select(
            'fileapp_filevideo.*',
            'videosapp_video.*',
            //'fileapp_filevideo_storages.*',
            'fileapp_storages.prefix'
        )->first();

        return Inertia::render('VideoExample'
        , ['film' => $film ]
        );
    }

    public function create(Request $request, $id){
        if(auth()->user()->id) {
            $create = Scenarist::create([
                'answer' => false,
                'film_id' => $id,
                'user_id'=> auth()->user()->id,
                'end_segment'=> $request->min,
                'start_segment' => $request->max,
                ]
            );
        }
        return redirect()->back();
    }

    public function studia($id){
        $studia = DB::table('studiaapp_studia')->find($id);
        //dd($studia);
        return Inertia::render('Studia', [
            'studia' => $studia,
            ]);
    }
}
