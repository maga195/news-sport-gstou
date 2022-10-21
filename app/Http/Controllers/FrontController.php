<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Post;

class FrontController extends Controller
{
    public function __construct()
    {
        $categories = DB::table('categories')->where('status', 'вкл')->get();
        $dcategories = DB::table('dcategories')->where('status', 'вкл')->get();
        Date::setlocale('ru');
        $setting = DB::table('settings')->first();
        $socials = DB::table('socials')->get();
        // if ($setting) {
        //     $setting->social = explode(',', $setting->social);
        //     foreach ($setting->social as $social) {
        //         $icon = explode('.', $social);
        //         $icon = $icon[1];
        //          $icons[] = $icon;
        //     }
        // }

        $icons = [];
        //$icon = explode('.', $socials);
        foreach($socials as $social){
            $icon = explode('.', $social->urlsocial);
            $icon = $icon[1];
            $icons[] = $icon;
        }

                // foreach($socials->urlsocial as $url){
                //     $icon = explode('.', $url);
                //     print_r($icon);
                //     exit();

                // }



        $lastnews = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->first();
        $leaderboard = DB::table('advertisements')->where('status', 'Отображение')->
                where('location', 'Таблица-лидеров')->orderBy('aid', 'DESC')->first();
        $sidebarTop = DB::table('advertisements')->where('status', 'Отображение')->
        where('location', 'Боковая-панель вверху')->orderBy('aid', 'DESC')->first();
        $sidebarBottom = DB::table('advertisements')->where('status', 'Отображение')->
        where('location', 'Боковая-панель внизу')->orderBy('aid', 'DESC')->first();
        $pages = DB::table('pages')->where('status','publish')->get();

        view()->share([
            'categories' => $categories,
            'dcategories' => $dcategories,
            'setting' => $setting,
            'socials' => $socials,
            'icons' => $icons,
            'lastnews' => $lastnews,
            'pages' => $pages,
            'leaderboard' => $leaderboard,
            'sidebarTop' => $sidebarTop,
            'sidebarBottom' => $sidebarBottom,

        ]);
    }

    public function page($slug){
        $page = DB::table('pages')->where('slug', $slug)->first();
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        return view('frontend.page',['page' => $page, 'latest' => $latest ]);
    }

    public function contactUs(){
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        return view('frontend.contact', ['latest' => $latest]);
    }

    public function index()
    {
        $featured = DB::table('posts')->where('category_id', 'LIKE', '%40%')->orderBy('pid', 'DESC')->get();
        $news = DB::table('posts')->where('category_id', 'LIKE', '%33%')->orderBy('pid', 'DESC')->get();
        $work = DB::table('posts')->where('category_id', 'LIKE', '%34%')->orderBy('pid', 'DESC')->get();
        $sport = DB::table('posts')->where('category_id', 'LIKE', '%44%')->orderBy('pid', 'DESC')->get();


        $galleries = DB::table('galleries')->orderBy('gid', 'DESC')->get();
        $video = DB::table('videos')->oldest()->first();
        $youtube = DB::table('youtubes')->orderBy('yid', 'DESC')->first();
        if($youtube){
            $mystring = $youtube->youtube;
            $findme = '=';
            $pos = strpos($mystring, $findme);
            if($pos === false){
                echo 'adsfsdfasdf';
                exit();
            }else{
                $codeyt = explode('=', $youtube->youtube)[1];
            }

            // foreach($youtube as $yt){
            //     $split = explode('=', $yt->youtube)[1];
            //     $codeyt[] = $split;

            // }
        }else{
            $defaulturl = 'https://www.youtube.com/watch?v=NDNt44uAg-Y';
            $codeyt = explode('=', $defaulturl)[1];
        }


        return view('frontend.index', [
            'featured' => $featured,
            'news' => $news,
            'work' => $work,
            'sport' => $sport,
            'galleries' => $galleries,
            'video' => $video,
            'youtube' => $youtube,
            'codeyt' => $codeyt,
        ]);
    }

    public function category($slug)
    {
        $cat = DB::table('categories')->where('slug', $slug)->first();
        $posts = DB::table('posts')->where('category_id', 'LIKE', '%'.$cat->cid.'%')->latest()->paginate(5);
        //$posts = Post::where('category_id', 'LIKE', '%'.$cat->cid.'%')->latest()->paginate(5);
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        $featured = DB::table('posts')->where('category_id', 'LIKE', '%40%')->orderBy('pid', 'DESC')->get();
        $galleries = DB::table('galleries')->orderBy('gid','DESC')->get();
        $video = DB::table('videos')->where('vid', '28')->first();
        $documents = DB::table('documents')->orderBy('did', 'DESC')->get();
        $youtube = DB::table('youtubes')->orderBy('yid', 'DESC')->first();
        if($youtube){
            $mystring = $youtube->youtube;
            $findme = '=';
            $pos = strpos($mystring, $findme);
            if($pos === false){
                return false;
            }else{
                $codeyt = explode('=', $youtube->youtube)[1];
            }
            //$codeyt = explode('=', $youtube->youtube)[1];

            // foreach($youtube as $yt){
            //     $split = explode('=', $yt->youtube)[1];
            //     $codeyt[] = $split;

            // }
        }else{
            $defaulturl = 'https://www.youtube.com/watch?v=NDNt44uAg-Y';
            $codeyt = explode('=', $defaulturl)[1];
        }

        return view('frontend.category',
                [
                    'posts' => $posts,
                    'cat' => $cat,
                    'latest' => $latest,
                    'featured' => $featured,
                    'galleries' => $galleries,
                    'video' => $video,
                    'documents' => $documents,
                    'youtube' => $youtube,
                    'codeyt' => $codeyt,
                ]);
    }

    public function dCategory($slug)
    {
        $cat = DB::table('dcategories')->where('slug', $slug)->first();
        $documents = DB::table('documents')->where('category_id', 'LIKE', '%'.$cat->dcid.'%')->latest()->paginate(5);
        //$posts = Post::where('category_id', 'LIKE', '%'.$cat->cid.'%')->latest()->paginate(5);
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        $featured = DB::table('posts')->where('category_id', 'LIKE', '%33%')->orderBy('pid', 'DESC')->get();
        $galleries = DB::table('galleries')->orderBy('gid','DESC')->get();
        $video = DB::table('videos')->orderBy('vid', 'DESC')->first();
        $youtube = DB::table('youtubes')->orderBy('yid', 'DESC')->first();
        if($youtube){
            $mystring = $youtube->youtube;
            $findme = '=';
            $pos = strpos($mystring, $findme);
            if($pos === false){
                return false;
            }else{
                $codeyt = explode('=', $youtube->youtube)[1];
            }
            //$codeyt = explode('=', $youtube->youtube)[1];

            // foreach($youtube as $yt){
            //     $split = explode('=', $yt->youtube)[1];
            //     $codeyt[] = $split;

            // }
        }else{
            $defaulturl = 'https://www.youtube.com/watch?v=NDNt44uAg-Y';
            $codeyt = explode('=', $defaulturl)[1];
        }

        return view('frontend.dcategory',
                [
                    'documents' => $documents,
                    'cat' => $cat,
                    'latest' => $latest,
                    'featured' => $featured,
                    'galleries' => $galleries,
                    'video' => $video,
                    'youtube' => $youtube,
                    'codeyt' => $codeyt,
                ]);
    }

    public function article($slug)
    {
        $article = DB::table('posts')->where('slug', $slug)->first();
        $cat = DB::table('categories')->where('slug', $slug)->first();
        //$category = DB::table('posts')->where('category_id', 'LIKE', '%'.$cat->title.'%')->first();
        $views = $article->views;
        DB::table('posts')->where('slug',$slug)->update(['views' => $views + 1 ]);
        $category = explode(',', $article->category_id);
        $category = $category[0];
        $related = DB::table('posts')->where('category_id', 'LIKE', '%'.$category.'%')->get();
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        return view('frontend.article',
                [
                    'article' => $article,
                    'related' => $related,
                    'latest' => $latest,
                     'cat' => $cat,
                    ]);
    }

    // public function documentArticle($slug)
    // {
    //     $article = DB::table('documents')->where('slug', $slug)->first();
    //     $cat = DB::table('categories')->where('slug', $slug)->first();
    //     //$category = DB::table('posts')->where('category_id', 'LIKE', '%'.$cat->title.'%')->first();
    //     $views = $article->views;
    //     DB::table('documents')->where('slug',$slug)->update(['views' => $views + 1 ]);
    //     $category = explode(',', $article->category_id);
    //     $category = $category[0];
    //     $related = DB::table('documents')->where('category_id', 'LIKE', '%'.$category.'%')->get();
    //     $latest = DB::table('documents')->where('status', 'publish')->orderBy('did', 'DESC')->get();
    //     return view('frontend.document-article',
    //             [
    //                 'article' => $article,
    //                 'related' => $related,
    //                 'latest' => $latest,
    //                  'cat' => $cat,
    //                 ]);
    // }

    public function searchContent(){
        //$url = 'http://127.0.0.1:8000/article';
        $url = url('article');
        $text = $_GET['text'];
        $search = DB::table('posts')->where('title', 'LIKE', '%'.$text.'%')
            ->orwhere('description','LIKE', '%'.$text.'%')->get();
        $output = '';
        echo '<ul class="search-result">';
        if(count($search) > 0){
            foreach($search as $s){
                // echo `<li><a href="$url/$t->slug">$t->title</a></li>`;
                echo '<li><a href="'. $url .'/'.$s->slug.'">'.$s->title.'</a></li>';
            }
        }else{
            echo '<li><a>Извините, Данные не найдены</a></li>';
        }

        echo '</ul>';
        return $output;
    }

    public function multiGallery(){
        $galleries = DB::table('galleries')->orderBy('gid','DESC')->paginate(30);
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        return view('frontend.galleries', ['galleries' => $galleries, 'latest' => $latest ]);
    }

    public function youtube(){
        $youtube = DB::table('youtubes')->orderBy('yid', 'DESC')->paginate(5);
        $errorYoutube = DB::table('youtubes')->orderBy('yid', 'DESC')->first();
        $codeyt = [];
        if($youtube){

            foreach($youtube as $y){
                $mystring = $y->youtube;

                $findme = '=';
                $pos = strpos($mystring, $findme);
                if($pos === false){
                    echo "Ошибка: название - ". $errorYoutube->titleyou ." ". $errorYoutube->youtube;
                    return false;
                }else{
                    $split = explode('=', $y->youtube);
                    $codeyt[] = $split[1];

                }


            }

            //$codeyt = explode('=', $youtube->youtube)[1];

            // foreach($youtube as $yt){
            //     $split = explode('=', $yt->youtube)[1];
            //     $codeyt[] = $split;

            // }
        }else{
            // $defaulturl = 'https://www.youtube.com/watch?v=NDNt44uAg-Y';
            // $split = explode('=', $defaulturl)[1];
            // $codeyt[] = $split;
            // print_r($codeyt);
            // exit();
        }

        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        return view('frontend.youtube', ['youtube' => $youtube, 'codeyt' => $codeyt, 'latest' => $latest ]);
    }

    public function video(){
        $videos = DB::table('videos')->orderBy('vid', 'DESC')->paginate(5);
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        return view('frontend.video',['videos' => $videos, 'latest' => $latest]);
    }

    public function screenVideo($slug){
        $video = DB::table('videos')->where('slug', $slug)->first();
        $latest = DB::table('posts')->where('status', 'publish')->orderBy('pid', 'DESC')->get();
        return view('frontend.screenvideo',['video' => $video, 'latest' => $latest]);
    }

    public function planEvents(){
        return view('frontend.plan-events');
    }

    public function project(){
        return view('frontend.project');
    }
}
