<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class CrundController extends Controller
{
    public function addCategory(Request $request)
    {



        $data = $request->except('_token');

        $tbl = decrypt($data['tbl']);
        // if($tbl === 'posts'){
        //     $request->validate([
        //         'title' => 'required',
        //         'category_id' => 'required|min:1',
        //         'image' => 'required',
        //         'description' => 'required',
        //     ]);
        // }

        switch($tbl){
            case 'posts' :
                $request->validate([
                            'title' => 'required',
                            'category_id' => 'required|min:1',
                            'image' => 'required',
                            'description' => 'required',
                            'description_short' => 'required',
                        ]);
                break;
            case 'pages' :
                $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                ]);
            break;
            case 'settings' :
                $request->validate([
                    'image' => 'required|mimes:jpg, jpeg, png,svg',
                    'about' => 'required',
                ]);
            break;
            case 'socials' :
                $request->validate([
                    'urlsocial' => 'required|unique:socials|max:255',
                ]);
                break;
            case 'videos' :
                $request->validate([
                    'title' => 'required',
                    'image' => 'required|mimes:mp4',
                ]);
                break;
            case 'youtubes' :
                $request->validate([
                    'titleyou' => 'required',
                    'youtube' => 'required',
                ]);
                break;
        }
        unset($data['tbl']);

        $data['created_at'] = date('Y-m-d H:i:s');
        if ($request->has('social')) {
            $data['social'] = implode(',', $data['social']);
        }
        if ($request->hasFile('image')) {
            if (empty($data['image'])) {
                $request->session()->flash('message', 'Пожалуйста, выберите данные, которое хотите картинку');
                return redirect()->back();
            }else{
                $data['image'] = $this->uploadImage($tbl, $data['image']);
            }

        }
        // if($request->hasFile('multi_image')){
        //     if (empty($data['multi_image'])) {
        //         $request->session()->flash('message', 'Пожалуйста, выберите данные, которое хотите картинку');
        //         return redirect()->back();
        //     }else{
        //         $multi_images = $data['multi_image'];
        //         foreach($multi_images as $image){
        //             //$image = $this->uploadMultiImage($tbl, $image);
        //             $name = $image->getClientOriginalName();
        //             $image->move(public_path() . '/uploads/' . $tbl, date('ymdgis') . $name);
        //             $imgs = date('ymdgis') . $name;
        //             DB::table('galleries')->insert([ 'multi_image' => $imgs, 'created_at' => Carbon::now() ]);
        //         }

        //         // print_r($imgAll);
        //         // exit();

        //     }
        // }



        if ($request->has('category_id')) {
            $data['category_id'] = implode(',', $data['category_id']);
        }


        if ($request->has('html')){
            $data['html'] = "<iframe src=";
        }



        // if($request->has('slug')){
        //     $data['slug'] = mb_substr($data['slug'],0,50);
        // }
        DB::table($tbl)->insert($data);
        if($tbl === 'messages'){
            Session::flash('message', 'Спасибо, что написали нам. Мы скоро к тебе вернемся');
        }else{
            Session::flash('message', 'Данные успешно добавлены');
        }

        return redirect()->back();
    }

    public function updateCategory(Request $request)
    {


        $data = $request->except('_token');
        $tbl = decrypt($data['tbl']);
        switch($tbl){
            case 'posts' :
                $request->validate([
                            'description_short' => 'required',
                        ]);
                break;
            case 'settings' :
                $request->validate([
                    'about' => 'required',
                ]);
            break;

        }
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($request->has('social')) {
            $data['social'] = implode(',', $data['social']);
        }
        if ($request->hasFile('image')) {
            $oldImage = DB::table($tbl)->where(key($data), reset($data))->first();
            if ($oldImage->image) {
                $deleteImage = public_path() . '/uploads/' . $tbl . "/" . $oldImage->image;
                unlink($deleteImage);
            }
            $data['image'] = $this->uploadImage($tbl, $data['image']);
        }
        if ($request->has('category_id')) {
            $data['category_id'] = implode(',', $data['category_id']);
        }

        // if($request->has('slug')){
        //     $data['slug'] = mb_substr($data['slug'],0,50);
        // }
        DB::table($tbl)->where(key($data), reset($data))->update($data);
        Session::flash('message', 'Данные успешно обновлены');
        return redirect()->back();
    }

    public function uploadImage($location, $imageName)
    {
        $name = $imageName->getClientOriginalName();
        $imageName->move(public_path() . '/uploads/' . $location, date('ymdgis') . $name);
        return date('ymdgis') . $name;
    }


}
