@extends('layout/plantilla')
@section('Agenda', 'Crear usuario')

@section('contenido')
<div class="card">
    <h5 class="card-header">Actualizar usuario</h5>
        <div class="card-body">

            <p class="card-text">
                <form action="{{url('update') }}" method="GET">
                    @csrf
                    @foreach($personas as $persona)
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required value="{{ $persona->nombre }}">
                        <label for="">Apellido</label>
                        <input type="text" name="apellido" class="form-control" required value="{{ $persona->apellido }}">
                        <label for="">fecha de nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" required value="{{ $persona->fecha_nacimiento }}">
                        <label for="">País</label>
                        <select name="pais" id="pais" class="form-select" aria-label="Default select example" required>
                            <option value="colombia">Colombia</option>
                            <option value="venezuela">Venezuela</option>
                        </select>
                        <label id="departamento" for="">Departamento</label>
                        <select name="departamento" id="departamentoS" class="form-select" aria-label="Default select example">
                            <option value="">Seleccione...</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{$departamento->iddepto}}">{{$departamento->nombre}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="url-ciudad" value="{{url('ciudad')}}">
                        <label id="ciudad" for="">Ciudad</label>
                        <select name="ciudad" id="ciudadS" class="form-select" aria-label="Default select example">
                            <option value="">Seleccione...</option>
                        </select>
                    @endforeach
                    <br>
                    <a href="{{route("personas.index")}}" class="btn btn-secondary">Regresar</a>
                    <button class="btn btn-success">Actualizar</button>
                </form>
            </p>

        </div>
  </div>
@endsection
