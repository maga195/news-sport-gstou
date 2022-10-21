<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Gallery;


class AdminController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function __construct(){
        $this->middleware('auth');
    }

    public function admin()
    {
        $posts = DB::table('posts')->orderBy('pid', 'DESC')->orderBy('pid', 'DESC')->paginate(5);
        foreach ($posts as $post) {
            $categories = explode(',', $post->category_id);
            foreach ($categories as $cat) {
                $postcat = DB::table('categories')->where('cid', $cat)->value('title');
                $categoriesPost[] = $postcat;
                $postcat = implode(',', $categoriesPost);
            }

            $post->category_id = $postcat;
            $categoriesPost = [];
        }
        $data = DB::table('categories')->get();
        return view('backend.index', ['posts' => $posts, 'data' => $data ]);
    }

    public function viewCategory()
    {

        $data = DB::table('categories')->get();
        return view('backend.categories.category', ['data' => $data]);
    }

    public function viewDCategory(){
        $data = DB::table('dcategories')->get();
        return view('backend.dcategories.dcategory', ['data' => $data]);
    }

    public function editCategory(Request $request, $cid)
    {
        $category = DB::table('categories')->where('cid', $cid)->first();
        if ($category === NULL) {
            return redirect('viewcategory');
        }
        $data = DB::table('categories')->get();
        return view('backend.categories.editCategory', ['data' => $data, 'category' => $category]);
    }

    public function editDCategory(Request $request, $dcid)
    {
        $category = DB::table('dcategories')->where('dcid', $dcid)->first();
        if ($category === NULL) {
            return redirect('viewdcategory');
        }
        $data = DB::table('dcategories')->get();
        return view('backend.dcategories.editdCategory', ['data' => $data, 'category' => $category]);
    }

    public function multipleCategory(Request $request)
    {
        $data = $request->except('_token');
        $tbl = decrypt($data['tbl']);
        $tblid = decrypt($data['tblid']);
        if ($data['bulk-action'] == 0) {
            //Session::flash('message', 'Пожалуйста, выберите действие, которое хотите выполнить');
            $request->session()->flash('message', 'Пожалуйста, выберите действие, которое хотите выполнить');
            return redirect()->back();
        }
        if (empty($data['select-data'])) {
            $request->session()->flash('message', 'Пожалуйста, выберите данные, которое хотите удалить');
            return redirect()->back();
        }



        $ids = $data['select-data'];
        foreach ($ids as $id) {
            $imageName = DB::table($tbl)->where($tblid, $id)->first();
            if(property_exists($imageName, 'image')){
                    $deleteImage = public_path() . '/uploads/' . $tbl . "/" . $imageName->image;
                    unlink($deleteImage);
                    DB::table($tbl)->where($tblid, $id)->delete();
            }else{
                DB::table($tbl)->where($tblid, $id)->delete();
            }
        }



        $request->session()->flash('message', 'Данные успешно удалены');
        return redirect()->back();
    }

    public function viewGallery(){
        $multi_images = DB::table('galleries')->orderBy('gid', 'DESC')->paginate(20);
        return view('backend.galleries.multi-image', ['multi_images' => $multi_images]);
    }

    public function addGallery(Request $request){
        $validated = $request->validate([

            //'image.min' => 'Image longer than 4 chars',
            'image' => 'required',
        ]);

        $image = $request->file('image');

        foreach($image as $multi_img){
            $name_gen = $multi_img->getClientOriginalName();
            //Image::make($multi_img)->resize(300,300)->save('image/multipic/'.$name_gen);
            $multi_img->move(public_path() . '/uploads/galleries/', date('ymdgis') . $name_gen);
            $imgs = date('ymdgis') . $name_gen;

            Gallery::insert([
                'image' => $imgs,
                'created_at' => Carbon::now(),
            ]);
        }


        return redirect()->back()->with('success', 'A Multiple image inserted successfully');
    }

    public function viewVideo(){
        $videos = DB::table('videos')->orderBy('vid', 'DESC')->paginate(5);
        return view('backend.video.view-video', ['videos' => $videos ]);
    }

    // public function editVideo($vid){
    //     $video = DB::table('videos')->where('vid', $vid)->first();
    //     if($video === null){
    //         return redirect('viewvideo');
    //     }
    //     $list = DB::table('videos')->get();
    //     return view('backend.video.edit-video', ['video' => $video, 'list' => $list ]);
    // }

    public function viewYoutube(){
        $youtubes = DB::table('youtubes')->orderBy('yid', 'DESC')->paginate(5);
        return view('backend.video.view-youtube', ['youtubes' => $youtubes ]);
    }

    public function editYoutube($yid){
        $youtube = DB::table('youtubes')->where('yid', $yid)->first();
        if($youtube === null){
            return redirect('viewyoutube');
        }
        $list = DB::table('youtubes')->get();
        return view('backend.video.edit-youtube', ['youtube' => $youtube, 'list' => $list ]);
    }

    public function setting()
    {
        $data = DB::table('settings')->first();
        $allsocials = DB::table('socials')->get();

        return view('backend.setting', ['data' => $data,'allsocials' => $allsocials ]);
    }

    public function addPost()
    {
        $categories = DB::table('categories')->get();
        return view('backend.posts.add-post', ['categories' => $categories]);
    }

    public function allPosts()
    {
        $posts = DB::table('posts')->orderBy('pid', 'DESC')->paginate(5);
        foreach ($posts as $post) {
            $categories = explode(',', $post->category_id);
            foreach ($categories as $cat) {
                $postcat = DB::table('categories')->where('cid', $cat)->value('title');
                $categoriesPost[] = $postcat;
                $postcat = implode(',', $categoriesPost);
            }

            $post->category_id = $postcat;
            $categoriesPost = [];
        }
        $published = DB::table('posts')->where('status', 'publish')->count();
        $allPosts = DB::table('posts')->count();
        return view('backend.posts.all-post', ['posts' => $posts, 'published' => $published, 'allPosts' => $allPosts]);
    }

    public function editPost($pid)
    {
        $post = DB::table('posts')->where('pid', $pid)->first();
        $postcat = explode(',', $post->category_id);
        $categories = DB::table('categories')->get();
        return view('backend.posts.edit-post', ['post' => $post, 'categories' => $categories, 'postcat' => $postcat]);
    }

    public function addDocument(){
        $dcategories = DB::table('dcategories')->get();
        return view('backend.documents.add-document', ['dcategories' => $dcategories]);
    }

    public function allDocuments(){
        $documents = DB::table('documents')->orderBy('did', 'DESC')->paginate(5);
        foreach ($documents as $document) {
            $categories = explode(',', $document->category_id);
            foreach ($categories as $cat) {
                $postcat = DB::table('categories')->where('cid', $cat)->value('title');
                $categoriesPost[] = $postcat;
                $postcat = implode(',', $categoriesPost);
            }

            $document->category_id = $postcat;
            $categoriesPost = [];
        }
        $published = DB::table('posts')->where('status', 'publish')->count();
        $allDocuments = DB::table('documents')->count();
        return view('backend.documents.all-document', ['documents' => $documents, 'published' => $published, 'allDocuments' => $allDocuments]);
    }

    public function editDocument($did){
        $document = DB::table('documents')->where('did', $did)->first();
        $documentcat = explode(',', $document->category_id);
        $dcategories = DB::table('dcategories')->get();
        return view('backend.documents.edit-document', ['document' => $document, 'dcategories' => $dcategories, 'documentcat' => $documentcat]);
    }


    public function addPage()
    {
        return view('backend.pages.add-page');
    }

    public function allPages()
    {
        $pages = DB::table('pages')->get();

        $published = DB::table('pages')->where('status', 'publish')->count();
        $allPages = DB::table('pages')->count();
        return view('backend.pages.all-pages', ['pages' => $pages, 'published' => $published, 'allPages' => $allPages]);
    }

    public function editPage($pid)
    {
        $editPage = DB::table('pages')->where('pageid', $pid)->first();
        return view('backend.pages.edit', ['editPage' => $editPage]);
    }

    public function messages(){
        $messages = DB::table('messages')->orderBy('mid','DESC')->paginate(20);
        return view('backend.pages.messages', ['messages' => $messages ]);
    }

    public function addAdv(){
        return view('backend.advertisement.add-adv');
    }

    public function allAdv(){
        $adv = DB::table('advertisements')->orderBy('aid','DESC')->get();
        return view('backend.advertisement.all-adv',['adv' => $adv ]);
    }
    public function editAdv(Request $request, $aid){


        $edit = DB::table('advertisements')->where('aid',$aid)->first();
        return view('backend.advertisement.edit-adv', ['edit' => $edit ]);
    }
}
