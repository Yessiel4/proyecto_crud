<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{

    public function index()
    {
        $datos = DB::select("select dep.nombre departamento, ci.nombre ciudad, pe.idpersona id, pe.pais, pe.nombre, pe.apellido, pe.fecha_nacimiento from personas pe, ciudad ci, departamento dep where pe.ciudad=ci.idciudad AND pe.departamento=dep.iddepto");
        // dd($datos);
        //página de inicio
        return view('inicio', compact('datos'));
    }


    public function create()
    {
        //registro

        $departamentos=DB::table('departamento')->get();

         return view("agregar",compact("departamentos"));
    }


    public function store(Request $request)
    {
        extract($_POST);

        DB::table('personas')->insert([

            "nombre" =>  $nombre, "apellido" => $apellido, "fecha_nacimiento"=>$fecha_nacimiento,"pais"=>$pais,"departamento"=>$departamento,"ciudad"=>$ciudad
        ]);
        //guardar datos
        // dd($_POST);
        //  return url("personas/index",compact("departamentos"));
    }


    public function show($id)
    {
        $personas = Personas::find($id);
        return  view("eliminar", compact('personas'));
    }


    // public function edit($id)
    // {
    //     $personas = Personas::find($id);
    //     return view("actualizar", compact("personas"));
    // }


    public function update(Request $request, $id)
    {
        extract($_GET);
        DB::table('personas')
        ->where('idpersona',$id)
        ->update(["nombre"=>$nombre,"apellido"=>$apellido,"fecha_nacimiento"=>$fecha_nacimiento,"departamento"=>$departamento,"ciudad"=>$ciudad]);

        return redirect()->route("personas.index")->with("success","Actualización exitosa");
    }


    public function destroy($id)
    {
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success","Eliminación exitosa");
    }

    public function ciudad(){
        extract($_POST);
        $ciudades = DB::table('ciudad')->where(['iddepto'=>$id])->get();
        return $ciudades;
    }
}
