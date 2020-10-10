@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Contactos del grupo: {{ $group->name }}</div>
                    <div class="card-options">
                        <a href="{{ route('groups.contacts.create', $group->id) }}" class="btn btn-success btn-sm">Nuevo <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($group->contacts as $email)
                                    <tr>
                                        <td>{{ $email->name }}</td>
                                        <td>{{ $email->email }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('groups.contacts.edit', [$group->id, $email->id]) }}" class="btn btn-primary btn-sm">
                                                Editar <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No hay registros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('groups.index') }}" class="btn btn-dark btn-sm">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection