<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
       
    {
       
        return view('frontend.index')->with('categories',Category::take(6)->get())
                                    ->with('first_post',Post::orderBy('created_at','desc')->first())
                                    ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                    ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                                    ->with('fourth_post',Post::orderBy('created_at','desc')->skip(3)->take(1)->get()->first())
                                    ->with('fifth_post',Post::orderBy('created_at','desc')->skip(4)->take(1)->get()->first())
                                    ->with('sixth_post',Post::orderBy('created_at','desc')->skip(5)->take(1)->get()->first())
                                    ->with('seventh_post',Post::orderBy('created_at','desc')->skip(6)->take(1)->get()->first())
                                    ->with('eighth_post',Post::orderBy('created_at','desc')->skip(7)->take(1)->get()->first())
                                    ->with('career',Category::find(1))
                                    ->with('career2', Category::find(4));
                                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
