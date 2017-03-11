<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Krucas\Notification\Notification;

class CatalogController extends Controller
{

    public function getIndex()
    {

        $peliculas = Movie::all();

        //print_r($this->arrayPeliculas);
        return view('catalog.index', array('peliculas' => $peliculas));


    }


    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array("pelicula" => $pelicula));

    }
    public function erase($id)
    {
        $pelicula = Movie::find($id);
        $pelicula->delete();
        $peliculas = Movie::all();
        return view('catalog.index', array('peliculas' => $peliculas));

    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {

        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array("pelicula" => $pelicula));
    }

    public function returnMovie($id)
    {

        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 0;
        return view('catalog.show', array("pelicula" => $pelicula));
    }

    public function rentedMovie($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 1;

        return view('catalog.show', array("pelicula" => $pelicula));
    }

    public function addMovie()
    {

        if (Movie::find($_POST['title'])) {
            echo "<strong style='color:red'>PELICULA EXISTENTE</strong>";
            return view('catalog.create');
        } else {
            $pelicula = new Movie;
            $pelicula->title = $_POST['title'];
            $pelicula->year = $_POST['year'];
            $pelicula->director = $_POST['director'];
            $pelicula->poster = $_POST['poster'];
            $pelicula->synopsis = $_POST['synopsis'];
            $pelicula->rented = 0;
            $pelicula->save();

            return view('catalog.show', array("pelicula" => $pelicula));
        }

    }

    public function editMovie()
    {

        $pelicula = Movie::find($_POST['id']);
        $pelicula->title = $_POST['title'];
        $pelicula->year = $_POST['year'];
        $pelicula->director = $_POST['director'];
        $pelicula->poster = $_POST['poster'];
        $pelicula->synopsis = $_POST['synopsis'];
        $pelicula->rented = 0;
        $pelicula->save();
        //Notification::successInstant('Success message');
        return view('catalog.show', array("pelicula" => $pelicula));
    }


}
