<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Events;
use App\Models\ImageSlider;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gambar Slider
        $slider = ImageSlider::where('is_Active', '0')->get();

        // Video
        $video = Video::where('is_active', '0')->first();

    
        // Berita
        $berita = Berita::where('is_active', '0')->orderBy('created_at', 'desc')->get();

        // Event
        $event = Events::where('is_active', '0')->orderBy('created_at', 'desc')->get();

        return view('frontend.welcome', compact('slider',  'video',  'berita', 'event', ));
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
