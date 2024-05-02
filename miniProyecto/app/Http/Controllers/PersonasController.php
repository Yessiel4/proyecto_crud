<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    //Muestra los datos de la tabla
    public function index()
    {
        $datos = DB::select("select dep.nombre departamento, ci.nombre ciudad, pe.idpersona id, pe.pais, pe.nombre, pe.apellido, pe.fecha_nacimiento from personas pe, ciudad ci, departamento dep where pe.ciudad=ci.idciudad AND pe.departamento=dep.iddepto");
        return view('inicio', compact('datos'));
    }

    //Formulario de registro
    public function create()
    {
        $departamentos=DB::table('departamento')->get();
        return view("agregar",compact("departamentos"));
    }

    //Guarda los datos
    public function store()
    {
        extract($_POST);
        DB::table('personas')->insert([
            "nombre" =>  $nombre, "apellido" => $apellido, "fecha_nacimiento"=>$fecha_nacimiento,"pais"=>$pais,"departamento"=>$departamento,"ciudad"=>$ciudad
        ]);
        return $this->index();
    }
    //Elimina los registros
    public function destroy()
    {
        extract($_GET);
        DB::table('personas')->where('idpersona','=',$id)->delete();

        return $this->index();
    }
    //Muestra los datos a editar
    public function edit()
    {
        extract($_GET);
        $personas = DB::table('personas')->where("idpersona",$id)->get();
        return view("actualizar", compact('personas'));
    }
    //Actualiza los datos
    public function update($id)
    {
        extract($_GET);
        DB::table('personas')
        ->where('idpersona',$id)
        ->update(["nombre"=>$nombre,"apellido"=>$apellido,"fecha_nacimiento"=>$fecha_nacimiento,"departamento"=>$departamento,"ciudad"=>$ciudad]);

        return redirect()->route("personas.index")->with("success","Actualización exitosa");
    }



    public function ciudad(){
        extract($_POST);
        $ciudades = DB::table('ciudad')->where(['iddepto'=>$id])->get();
        return $ciudades;
    }
}
