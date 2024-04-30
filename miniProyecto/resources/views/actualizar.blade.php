@extends('layout/plantilla')
@section('Agenda', 'Crear usuario')

@section('contenido')
<div class="card">
    <h5 class="card-header">Actualizar usuario</h5>
        <div class="card-body">

            <p class="card-text">
                <form action="{{ route('personas.update',$personas->id) }}" method="GET">
                    @csrf
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required value="{{ $personas->nombre }}">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido" class="form-control" required value="{{ $personas->apellido }}">
                    <label for="">fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" required value="{{ $personas->fecha_nacimiento }}">
                    <br>
                    <a href="{{ route("personas.index") }}" class="btn btn-secondary">Regresar</a>
                    <button class="btn btn-success">Actualizar</button>
                </form>
            </p>

        </div>
  </div>
@endsection
