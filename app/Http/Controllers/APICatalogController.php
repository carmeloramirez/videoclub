<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Auth;

class APICatalogController extends Controller
{

    public function index(){
        return response()->json( Movie::all() );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $pelicula = new Movie;
        $title = $request->input('title');
        $year = $request->input('year');
        $director = $request->input('director');
        $poster = $request->input('poster');
        $synopsis = $request->input('synopsis');

        $pelicula->title = $title;
        $pelicula->year = $year;
        $pelicula->director = $director;
        $pelicula->poster = $poster;
        $pelicula->synopsis = $synopsis;
        $pelicula->save();
        return response()->json( ['error' => false,
            'msg' => 'La película se ha creado perfectamente' ] );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return response()->json( Movie::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function edit($id)
     {
         //
     }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $peliculas = Movie::findOrFail($id);
        $title = $request->input('peliculas.title');
        /*$year = $request->input('year');
        $director = $request->input('director');
        $poster = $request->input('poster');
        $synopsis = $request->input('synopsis');*/

        $peliculas->title = $title;
        /*$peliculas->year = $year;
        $peliculas->director = $director;
        $peliculas->poster = $poster;
        $peliculas->synopsis = $synopsis;*/
        $peliculas->save();
        return response()->json( ['error' => false,
            'msg' => 'La película se ha modificado perfectamente' ] );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $peliculas = Movie::findOrFail($id);
        $peliculas->delete();
        return response()->json( ['error' => false,
            'msg' => 'La película se ha borrado' ] );
    }

    public function putRent($id) {
        $pelicula = Movie::findOrFail( $id );
        $pelicula->rented = 1;
        $pelicula->save();
        return response()->json( ['error' => false,
            'msg' => 'La película se ha marcado como alquilada' ] );
    }

    public function putReturn($id) {
        $pelicula = Movie::findOrFail( $id );
        $pelicula->rented = 0;
        $pelicula->save();
        return response()->json( ['error' => false,
            'msg' => 'La película se ha devuelto' ] );
    }
}
