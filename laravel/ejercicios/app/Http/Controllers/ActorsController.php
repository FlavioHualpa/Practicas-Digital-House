<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;

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
      $actor = Actor::find($id);
      return view('actor', [ 'actor' => $actor ]);
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

   public function directory()
   {
      $actores = Actor::
         orderBy('first_name')->
         orderBy('last_name')->
         paginate(10);
      return view(
         'actores',
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
         'actores',
         [ 'actores' => $actores, 'busqueda' => $req->get('busqueda') ]
      );
   }
}
