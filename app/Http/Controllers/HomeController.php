<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Postrequest;

class HomeController extends Controller
{
    //
    public function index(){
    $posts=post::latest()->paginate(6);
  return view('welcome')->with([
      'posts'=>$posts
                    ]);
                }

// public function show($slug){
//     $post=post::where('slug',$slug)->first();
//         return view('show')->with([
//             'post'=>$post
//                         ]);
//                     }

// public function create(){
//      return view('create');
// }

// public function store(Postrequest $request){
//     if($request->has('image')){
//         $file=$request->image;
//         $image_name=time().'_'.$file->getClientOriginalName();
//         $file->move(public_path('images'),$image_name);

//     }
//     post::create([
//         'title'=>$request->title,
//         'slug'=>Str::slug($request->title),
//         'body'=>$request->body,
//         'image'=>$image_name,
//         'user_id'=>auth()->user()->id,
//     ]);
//     return redirect()->route('home')->with([
//         'succes'=>'Article Ajoute'
//     ]);
// }
// public function edit($slug){
//     $post=post::where('slug',$slug)->first();
//     return view('edit')->with([
//         'post'=>$post
//     ]);}

//   public function update(Postrequest $request,$slug){

//     $post=post::where('slug',$slug)->first();
//     if($request->has('image')){
//         $file=$request->image;
//         $image_name=time().'_'.$file->getClientOriginalName();
//         $file->move(public_path('images'),$image_name);
//         unlink(public_path('images').'/'.$post->image);
//         $post->image=$image_name;
// }
//    $post->update([
//             'title'=>$request->title,
//             'slug'=>Str::slug($request->title),
//             'body'=>$request->body,
//             'image'=>$post->image,
//             'user_id'=>auth()->user()->id,

//         ]);
//         return redirect()->route('home')->with([
//             'succes'=>'Article Modifie'
//         ]);
//     }

    public function delete($slug){
        $post=post::where('slug',$slug)->first();
        unlink(public_path('images').'/'.$post->image);
        $post->delete();
        return redirect()->route('home')->with([
            'succes'=>'Article Supprime'
        ]);}




}



