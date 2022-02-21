<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;
use App\Http\Requests\ParametroRequest;

class ParametroController extends Controller
{
    public function update(ParametroRequest $request, $id)
    {
        $request->validated();

        $parametro = Parametro::find($id)->update($request->all());

        if ($parametro) {
            return redirect()->route('usuarios.index')->with('success', 'El parámetro de correo ha sido actualizado satisfactoriamente');
        }
        else {
            return back()->with('failed', 'Error, no se pudo actualizar el parámetro');
        }
    }
}
