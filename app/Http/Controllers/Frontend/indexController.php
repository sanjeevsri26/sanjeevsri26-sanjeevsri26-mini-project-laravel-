<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blogs;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blogs::all(); // Retrieve all products from the database
        return view('Frontend.index', compact('blogs'));
       
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
     * @param  \App\Models\vc  $vc
     * @return \Illuminate\Http\Response
     */
    public function show(vc $vc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vc  $vc
     * @return \Illuminate\Http\Response
     */
    public function edit(vc $vc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vc  $vc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vc $vc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vc  $vc
     * @return \Illuminate\Http\Response
     */
    public function destroy(vc $vc)
    {
        //
    }
}
