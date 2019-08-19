<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movie;
use App\Http\Requests\CreateActorRequest;
use App\Http\Requests\UpdateActorRequest;
use Auth;

class ActorsController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      //
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      if (Auth::user() == null) {
         return redirect('/home');
      }

      $favoritas = Movie::orderBy('title')->get();

      return view('actors.add',
         [ 'favorites' => $favoritas ]
      );
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(CreateActorRequest $request)
   {
      if (Auth::user() == null) {
         return redirect('/home');
      }

      if ($request->has('portrait')) {
         $url = $request->file('portrait')->store('public');
         $file = basename($url);
      }
      else {
         $file = null;
      }

      Actor::create([
         'first_name' => $request->first_name,
         'last_name' => $request->last_name,
         'portrait_url' => $file,
         'rating' => rand(10, 95) / 10.0,
         'favorite_movie_id' => $request->favorite
      ]);

      return redirect('/actores');
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
      $actor = Actor::find($id);
      return view('actors.details', [ 'actor' => $actor ]);
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      if (Auth::user() == null) {
         return redirect('/home');
      }

      $actor = Actor::find($id);
      $favoritas = Movie::orderBy('title')->get();

      return view(
         'actors.edit',
         [ 'actor' => $actor, 'favorites' => $favoritas ]
      );
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(UpdateActorRequest $request, $id)
   {
      if (Auth::user() == null) {
         return redirect('/home');
      }

      $actor = Actor::find($id);

      if ($request->has('portrait')) {
         $url = $request->file('portrait')->store('public');
         $file = basename($url);
      }
      else {
         $file = $actor->portrait_url;
      }

      $actor->update([
         'id' => $request->id,
         'first_name' => $request->first_name,
         'last_name' => $request->last_name,
         'portrait_url' => $file,
         'rating' => $request->rating,
         'favorite_movie_id' => $request->favorite
      ]);

      return redirect('/actor/' . $id);
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      Actor::find($id)->delete();

      return redirect('/actores/');
   }

   public function directory()
   {
      $actores = Actor::
         orderBy('first_name')->
         orderBy('last_name')->
         paginate(10);
      return view(
         'actors.list',
         [ 'actores' => $actores ]
      );
   }

   public function search(Request $req)
   {
      $keyword = '%' . $req->get('busqueda') . '%';
      $actores = Actor::
         where('first_name', 'LIKE', $keyword)->
         orWhere('last_name', 'LIKE', $keyword)->
         orderBy('first_name')->
         orderBy('last_name')->
         paginate(10);
      return view(
         'actors.list',
         [ 'actores' => $actores, 'busqueda' => $req->get('busqueda') ]
      );
   }
}
