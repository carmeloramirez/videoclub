@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">

            <img class="img-responsive" src="{{$pelicula->poster}}" alt="">

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h1>{{$pelicula->title}}</h1>
            <h4>{{$pelicula->year}}</h4>
            <h4>{{$pelicula->director}}</h4>
            <p><strong>Resumen: </strong>{{$pelicula->synopsis}}</p>
            <p><strong>Estado: </strong>
                @if ($pelicula->rented == 1)
                    Pelicula no alquilable, alquilada actualmente.
            <div>
                <a href="{{ url('/catalog/returnMovie/' . $pelicula->id ) }}"><button class="btn btn-warning">Devolver</button></a>

                @else
Alquiler disponible
                    <a href="{{ url('/catalog/rentedMovie/' . $pelicula->id ) }}"><button class="btn btn-success">Alquiler</button></a>

                @endif
                <a href="{{ url('/catalog/edit/' . $pelicula->id ) }}"><button class="btn btn-info" ><i class="fa fa-pencil"></i> Editar Pelicula</button></a>
                <a href="{{ url('/catalog/erase/' . $pelicula->id ) }}"><button class="btn btn-danger" ><i class="fa fa-pencil"></i> Borrar Pelicula</button></a>
                <a href="{{ url('catalog/') }}"><button class="btn btn-default" ><i class="fa fa-refresh"></i> Volver al listado</button></a>
            </div>


        </div>
    </div>

@stop