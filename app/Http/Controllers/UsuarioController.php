<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('categoria')->orderBy('apellidos')->orderBy('nombres')->get();
        $parametro = Parametro::find(1);

        return view('usuario.index', compact('parametro'))->withUsuarios($usuarios);
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $paises = Http::withOptions(['verify' => false])->get('https://api.first.org/data/v1/countries?region=South America')->json('data');

        return view('usuario.create', compact('categorias', 'paises'));
    }

    public function store(UsuarioRequest $request)
    {
        $request->validated();

        $usuario = Usuario::create($request->all());

        if ($usuario) {
            return redirect()->route('usuarios.index')->with('success', 'El usuario ha sido creado satisfactoriamente');
        }
        else {
            return back()->with('failed', 'Error, no se pudo crear el usuario');
        }

    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $categorias = Categoria::orderBy('nombre')->get();
        $paises = Http::withOptions(['verify' => false])->get('https://api.first.org/data/v1/countries?region=South America')->json('data');

        return view('usuario.edit', compact('categorias', 'paises'))->withUsuario($usuario);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $request->validated();

        $usuario = Usuario::find($id)->update($request->all());

        if ($usuario) {
            return redirect()->route('usuarios.index')->with('success', 'El usuario ha sido actualizado satisfactoriamente');
        }
        else {
            return back()->with('failed', 'Error, no se pudo actualizar el usuario');
        }
    }

    public function destroy($id)
    {
        Usuario::destroy($id);

        return back()->with('success', 'El usuario ha sido eliminado');
    }
}
