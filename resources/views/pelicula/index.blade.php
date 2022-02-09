@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif

<a href="{{url('pelicula/create')}}" class="btn btn-success">AÑADIR UNA NUEVA PELICULA</a>
<br><br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>POSTER</th>
            <th>DURACION</th>
            <th>CLASIFICAION</th>
            <th>ACCION</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($peliculas as $pelicula)
            <tr>
                <td>{{$pelicula->id}}</td>

                <td>{{$pelicula->Nombre}}</td>

                <td>
                    <img src="{{ asset('storage').'/'.$pelicula->Poster}}" width="100" alt="">
                </td>
                <td>{{$pelicula->Duracion}}</td>
                <td>{{$pelicula->Clasificacion}}</td>

                <td>
                    <a href="{{ url ('/pelicula/'.$pelicula->id.'/edit')}}" class="btn btn-warning">
                    Editar
                    </a> 
                    
                    
                <form action="{{ url('/pelicula/'.$pelicula->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input class="btn btn-danger"type="submit" onclick="return confirm('¿Deceas Borrar esta Pelicula?')" value="Borrar">

                </form>
                </td>
                
            </tr>
        @endforeach

    </tbody>


</table>

</div>
@endsection