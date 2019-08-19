<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use App\Http\Requests\CreateMovieRequest;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Movie::orderBy('title')->get();

        return view(
           'movies.list',
           [ 'peliculas' => $peliculas ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //session()->put('algo', [ 'id' => 1, 'nombre' => 'Atlanta', 'fecha' => '2015-5-31', 'token' => 'A3E509BB13E' ]);
        $generos = Genre::orderBy('name')->get();
        return view(
           'movies.add',
           [ 'genres' => $generos ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieRequest $request)
    {
        $movie = Movie::create([
           'title' => $request->title,
           'length' => $request->length,
           'rating' => $request->rating,
           'awards' => $request->awards,
           'release_date' => $request->release,
           'genre_id' => $request->genre
        ]);

        return redirect('/peliculas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $pelicula = Movie::find($id);

      return view(
         'movies.details',
         [ 'pelicula' => $pelicula ]
      );
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
