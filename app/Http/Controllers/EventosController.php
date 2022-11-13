<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Carbon\Carbon;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Eventos = Evento::paginate(5); 
        return view('Eventos', compact('Eventos'));
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
        $data = new Evento;
        $data->descripcion=$request->descripcion;
        $data->backgroundColor=$request->backgroundColor;
        $data->textColor=$request->textColor;
        $data->borderColor=$request->borderColor;
        $data->save();

        return redirect()->route('Eventos');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $Eventos = Evento::find($id);
        $Eventos->descripcion = $request->descripcion;
        $Eventos->backgroundColor=$request->backgroundColor;
        $Eventos->textColor=$request->textColor;
        $Eventos->borderColor=$request->borderColor;
        $Eventos->save();
        return redirect()->route('Eventos')->with('flash','Su usuario ha sido actualizado con Exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Eventos = Evento::find($id)->delete();
        return redirect()->route('Eventos')->with('flash','Su usuario ha sido eliminado con Exito.');
    }
}
