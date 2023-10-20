<?php

namespace App\Http\Controllers;

use App\Models\Conferencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConferenciaRequest;
use App\Http\Requests\UpdateConferenciaRequest;

class ConferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferencias = Conferencia::all();
        $respuesta = [
            'response' => true,
            'data' => $conferencias,
            'msg' => 'respuesta completa'
        ];
        return response()->json($respuesta);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resp = Conferencia::create([
            'ponente' => $request->ponente,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'lugar' => $request->lugar,
            'hora' => $request->hora,
            'capacidad_asistentes' => $request->capacidad_asistentes

        ]);
        if (!$resp)
            return response()->json("error", 500);
        //retonrar el arreglo $data con los datos de $resp
        return response()->json($resp, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conferencia $conferencia)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //verificamos que exista la conferencia
        $conferencia = Conferencia::find($id);
        //validamos que exista
        if (!$conferencia)
        {
            $respuesta = [
                "codigo" => 500,
                "msg" => "No existe la conferencia que pretendes modificar",
                "data" => null,
            ];
            return response()->json($respuesta, 500);
        }

        //actualizar el registro de conferencia con los datos recibidos en el payload de la peticion
        $actualiza = $conferencia->update([
            "titulo" => $request->titulo,
            "ponente" => $request->ponente,
            "descripcion" => $request->descripcion,
            "fecha" => $request->fecha,
            "hora" => $request->hora,
            "lugar" => $request->lugar ?? "Auditorio Principal UTS",
            "capacidad_asistentes" => $request->capacidad_asistentes
        ]);
        //verificamos si se actualizo
        if ($actualiza)
        {
            $respuesta = [
                "codigo" => 200,
                "msg" => "Conferencia actualizada correctamente, con el id: $id",
                "data" => $conferencia,
            ];
            return response()->json($respuesta, 200);
        }
        else
        {
            $respuesta = [
                "codigo" => 500,
                "msg" => "Error al actualizar la conferencia con el id: $id",
                "data" => null,
            ];
            return response()->json($respuesta, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //verificamos que exista la conf
        $conferencia = Conferencia::find($id);
        if (!$conferencia)
        {
            $respuesta = [
                "codigo" => 500,
                "msg" => "No existe la conferencia que pretendes eliminar, con el id: $id",
                "data" => null,
            ];
            return response()->json($respuesta, 500);
        }
        //borramos la conferencia
        $elimina = $conferencia->delete();
        //devolvermos resultado
        if (!$elimina)
        {
            $respuesta = [
                "codigo" => 500,
                "msg" => "Error al eliminar la conferencia con el id: $id",
                "data" => null,
            ];
            return response()->json($respuesta, 500);
        }
        else
        {
            $respuesta = [
                "codigo" => 200,
                "msg" => "Conferencia eliminada correctamente, con el id: $id",
                "data" => null,
            ];
            return response()->json($respuesta, 200);
        }
    }
}
