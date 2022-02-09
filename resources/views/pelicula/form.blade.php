@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>{{$modo}} Pelicula </h1>

    <div class="form-group">
    
    <label for="Nombre"> NOMBRE <input type="text" class="form-control" name="Nombre" value="{{ isset($pelicula -> Nombre)?$pelicula -> Nombre:''}}" id="Nombre"></label>
    <br>
    </div>

    <div class="form-group">
    <label for="Poster"> POSTER </label>
    @if(isset($pelicula->Poster))
        <img src="{{ asset('storage').'/'.$pelicula->Poster}}" width="100" alt="">
    @endif
        <input type="file" class="form-control" name="Poster" value=""id="Poster">
    <br>
    </div>

    <div class="form-group">
    <label for="Duracion"> DURACION <input type="time" class="form-control" name="Duracion" value="{{ isset($pelicula -> Duracion)?$pelicula -> Duracion:''}}" id="Duracion"></label>
    <br>
    </div>

    <div class="form-group">
    <label for="clasificacion"> CLASIFICACION<input type="text" class="form-control" name="Clasificacion" value="{{ isset($pelicula -> Clasificacion)?$pelicula -> Clasificacion:''}}"id="Clasificacion"></label>
    <br>
    </div>

    <input type="submit" class="btn btn-success" value="{{$modo}} Pelicula"> <br>


    <a class="btn btn-primary" href="{{url('pelicula/')}}">REGRESAR</a>

</div>
@endsection