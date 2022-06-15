<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(6);
        return view('peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::orderBy('id')->get();
        return view('peliculas.create', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:peliculas,titulo'],
            'sinopsis'=>['required', 'string', 'min:5'],
            'duracion'=>['required', 'numeric', 'between:30,248'],
            'estreno'=>['required'],
            'genero_id'=>['required'],
            'image'=>['required', 'image', 'max:2048']
        ]);

        $imagen = $request->image->store('img');

        Pelicula::create([
            'titulo'=>$request->titulo,
            'sinopsis'=>$request->sinopsis,
            'duracion'=>$request->duracion,
            'estreno'=>$request->estreno,
            'genero_id'=>$request->genero_id,
            'user_id'=>Auth::user()->id,
            'image'=>$imagen
        ]);

        return redirect()->route('peliculas.index')->with('info', 'Pelicula Creada con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        $generos = Genero::orderBy('id')->get();
        return view('peliculas.show', compact('generos', 'pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        $generos = Genero::orderBy('id')->get();
        return view('peliculas.edit', compact('generos', 'pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:peliculas,titulo,'.$pelicula->id],
            'sinopsis'=>['required', 'string', 'min:5'],
            'duracion'=>['required', 'numeric', 'between:30,248'],
            'estreno'=>['required'],
            'genero_id'=>['required'],
            'image'=>['nullable', 'image', 'max:2048']
        ]);

        $imagen = $pelicula->image;

        if($request->image){
            Storage::delete($pelicula->image);
            $imagen = $request->image->store('img');
        }

        $pelicula->update([
            'titulo'=>$request->titulo,
            'sinopsis'=>$request->sinopsis,
            'duracion'=>$request->duracion,
            'estreno'=>$request->estreno,
            'genero_id'=>$request->genero_id,
            'image'=>$imagen
        ]);

        return redirect()->route('peliculas.index')->with('info', 'Pelicula Actualizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        $imagen = $pelicula->image;
        
        Storage::delete($imagen);

        $pelicula->delete();

        return redirect()->route('peliculas.index')->with('info', 'Pelicula Eliminada con Éxito');
    }

    public function cambiarEstreno(Pelicula $pelicula){
        $estreno = $pelicula->activo;
        if($pelicula->estreno =='En desarrollo'){
            $estreno = 2;
        }
        
        if($pelicula->estreno == 'Estrenada'){
            $estreno = 1;
        }

        $pelicula->update([
            'estreno'=>$estreno
        ]);

        return redirect()->route('peliculas.index')->with('info', 'Estreno de la Pelicula Actualizado con Éxito');
    }
}
