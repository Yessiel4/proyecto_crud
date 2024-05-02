@extends('..layout/plantilla')
@section('Agenda', 'Crud')
@section('contenido')
    <div class="card">
        <h5 class="card-header">Agenda</h5>
        <div class="card-body">
            <p>
                <a href="{{ url('create') }}" class="btn btn-primary">+ Agregar</a>
            </p>
            <hr>
            <p class="card-text">
            <div class="table-responsive">
                <table class="table  table-sm table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de nacimiento</th>
                        <th>País</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->apellido }}</td>
                                <td>{{ $item->fecha_nacimiento }}</td>
                                <td>{{ $item->pais }}</td>
                                <td>{{ $item->departamento }}</td>
                                <td>{{ $item->ciudad }}</td>
                                <td>
                                    <form action="{{ url('edit') }}" method="GET">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-warning btn-sm">
                                            Editar
                                        </button>
                                    </form>
                                <td>
                                    <form action="{{ url('destroy') }}" method="GET">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </p>

        </div>
    </div>

@endsection
