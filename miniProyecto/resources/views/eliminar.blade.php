@extends('layout/plantilla')
@section('Agenda', 'Crear usuario')

@section('contenido')
<div class="card">
    <h5 class="card-header">Eliminar usuario</h5>
        <div class="card-body">

            <p class="card-text">
                    ¿Estás seguro de eliminar este registro?
                  <table>
                    <thead class="table table-sm table-hover">
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de nacimiento</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $personas->nombre }}</td>
                            <td>{{ $personas->apellido}}</td>
                            <td>{{ $personas->fecha_nacimiento }}</td>
                        </tr>
                    </tbody>
                  </table>
                  <hr>
                  <form action="{{ route('personas.destroy', $personas->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('personas.index') }}" class="btn btn-secondary">Regresar</a>
                    <button class="btn btn-danger">Eliminar</button>
                  </form>
            </p>

        </div>
  </div>
@endsection
