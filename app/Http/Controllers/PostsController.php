<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
        if($categories->count()==0){
            Session::flash('info','must declare category first');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        
        $this->validate($request,[
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required'
        ]);
     
        $featured=$request->featured;
        
        
        $featured_new_name=time().$featured->getClientOriginalName();
       
        $featured->move('uploads/posts', $featured_new_name);

        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/' . $featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->title),
            'price'=>$request->price,
            'availability'=>$request->availability
            
        ]);
        Session::flash('success','post created successfully');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $post=Post::find($id);
        if($request->hasFile('featured')){
            $featured=$request->featured;
            $featured_new_name=time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured='uploads/posts/' . $featured_new_name;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->price=$request->price;
        $post->availability=$request->availability;
        $post->save();
        Session::flash('success','post updated succesfully');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash('success','the post is deleted');
        return redirect()->back();
    }
    public function trashed(){
        $posts=Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id){
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','post deleted permanently');
        return redirect()->back();

    }
    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('posts','post restored successfully');
        return redirect()->route('posts');
    }
}
