<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
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
        $usuarios = User::paginate(5); 
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all(); 
        return view("usuarios.create", compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = User::create($request->all());
        if($request->has('password')){
            $usuarios->password = Hash::make($request->password);
        } 
        $usuarios->save();
        return redirect()->route('usuarios')->with('flash','Su usuario ha sido guardado satisfactoriamente.');
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
        $usuarios = User::findOrFail($id);
        return view('usuarios.edit', compact('usuarios'));
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
        $usuarios =  User::findOrFail($id);
        $usuarios->fill($request->all());
        if($request->has('password')){
            $usuarios->password = Hash::make($request->password);
        } 
        $usuarios->save();
        return redirect()->route('usuarios')->with('flash','Su usuario ha sido actualizado con Exito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->delete();
        return redirect()->route('usuarios')->with('flash','Su usuario ha sido eliminado con Exito.');
    }
}
