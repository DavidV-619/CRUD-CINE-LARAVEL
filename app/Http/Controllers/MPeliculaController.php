<?php

namespace App\Http\Controllers;

use App\Models\M_pelicula;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MPeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['peliculas']=M_pelicula::paginate(5);
        return view('pelicula.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('pelicula.create');
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
        

        //$datosPelicula = request()->all();//
        $datosPelicula = request()->except('_token');

        if($request->hasFile('Poster')){
            $datosPelicula['Poster']=$request->file('Poster')->store('uploads','public');
        }

        M_pelicula::insert($datosPelicula);
       // return response() -> json($datosPelicula);
       return redirect('pelicula')->with('mensaje','PELICULA AGREGADA EXITOSAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\M_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(M_pelicula $m_pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\M_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelicula=M_pelicula::findOrFail($id);
        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\M_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosPelicula = request()->except(['_token','_method']);

        if($request->hasFile('Poster')){
            $pelicula=M_pelicula::findOrFail($id);
            Storage::delete('public/'.$pelicula->Poster);
            $datosPelicula['Poster']=$request->file('Poster')->store('uploads','public');
        }

        M_pelicula::where('id','=',$id)->update($datosPelicula);

        $pelicula=M_pelicula::findOrFail($id);
        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\M_pelicula  $m_pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $pelicula=M_pelicula::findOrFail($id);

        if(Storage::delete('public/'.$pelicula->Poster)){
            M_pelicula::destroy($id);
        }

        return redirect('pelicula')->with('mensaje','PELICULA ELIMINADA');
    }
}
