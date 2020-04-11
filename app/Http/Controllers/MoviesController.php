<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=27468285186dfe38d2537ca6be4196b7')
                    ->json()['results'];
                    // dump($popularMovies);
        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=27468285186dfe38d2537ca6be4196b7')
                    ->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre)
        {
            return [ $genre['id'] => $genre['name'] ];
        });
        $nowPlaying = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=27468285186dfe38d2537ca6be4196b7')
        ->json()['results'];
       
        // dump($nowPlaying);
       
        return view('index',[
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlaying' => $nowPlaying,
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
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=27468285186dfe38d2537ca6be4196b7&append_to_response=credits,videos,images')
                    ->json();
                    // dump($movie);
        return view('show',[
            'movie' => $movie,
        ]);
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
