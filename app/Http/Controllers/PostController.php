<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //  @return void
public function __construct()
    {
        $this->authorizeResource(Post::class, null, [
            'except' => [ 'index', 'show' ],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts=post::latest()->paginate(6);
  return view('welcome')->with([
      'posts'=>$posts
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('create');}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->has('image')){
            $file=$request->image;
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'),$image_name);
            $request->image=$image_name;

        }
        post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'body'=>$request->body,
            'image'=>$request->image,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect()->route('home')->with([
            'succes'=>'Article Ajoute'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //

        return view('show')->with([
            'post'=>$post
                        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
        return view('edit')->with([
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,post $post)
    {
        //
    if($request->has('image')){
        $file=$request->image;
        $image_name=time().'_'.$file->getClientOriginalName();
        $file->move(public_path('images'),$image_name);
        unlink(public_path('images').'/'.$post->image);
        $post->image=$image_name;
}
   $post->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'body'=>$request->body,
            'image'=>$post->image,
            'user_id'=>auth()->user()->id,

        ]);
        return redirect()->route('home')->with([
            'succes'=>'Article Modifie'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
        if(file_exists(public_path('./images').$post->image)){
            unlink(public_path('images').'/'.$post->image);
        }

        $post->delete();
        return redirect()->route('home')->with([
            'succes'=>'Article Supprime'
        ]);
    }

    public function delete($slug)
    {
        //
        $post=post::withTrashed()->where('slug',$slug)->first();
        if(file_exists(public_path('./images').$post->image)){
            unlink(public_path('images').'/'.$post->image);
        }

        $post->forceDelete();
        return redirect()->route('home')->with([
            'succes'=>'Article Supprime Definitevement'
        ]);
    }
    public function restore($slug)
    {
        //
          $post=post::withTrashed()->where('slug',$slug)->first();
        $post->restore();
        return redirect()->route('home')->with([
            'succes'=>'Article Recupere'
        ]);
    }
}
