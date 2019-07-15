<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuariosController extends Controller
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
        return view('registrarUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $form)
    {
        $reglas = [
           'nombre' => 'required|min:2|max:50',
           'apellido' => 'required|min:2|max:50',
           'email' => 'required|email|unique:usuarios',
           'pais' => 'required',
           'nacimiento' => 'required|before:today',
           'sexo' => 'required|in:f,m',
           'avatar' => 'file|image',
           'pass' => 'required|min:6|max:18|alpha_num',
           'passConf' => 'required|same:pass',
           'terminos' => 'accepted',
        ];

        $mensajes = [
           'accepted' => 'Debe aceptar los términos de uso'
        ];

        $form->validate($reglas, $mensajes);

        // en este punto los datos están validados
        if ($form->has('avatar')) :
           $ruta = $form->file('avatar')->store('public');
           $archivoSubido = '/storage/' . basename($ruta);
        else :
           $archivoSubido = null;
        endif;
        $hashedPass = password_hash($form->pass, PASSWORD_DEFAULT);

        $usuario = new Usuario();
        $usuario->first_name = $form->nombre;
        $usuario->last_name = $form->apellido;
        $usuario->email = $form->email;
        $usuario->country_code = $form->pais;
        $usuario->birth_date = $form->nacimiento;
        $usuario->sex = $form->sexo;
        $usuario->avatar_url = $archivoSubido;
        $usuario->password = $hashedPass;
        $usuario->save();

        return 'La base de datos ahora tiene ' . Usuario::all()->count() . ' usuarios.';
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
}
