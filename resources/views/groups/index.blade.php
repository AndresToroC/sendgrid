@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Grupos de correos</div>
                    <div class="card-options">
                        <a href="{{ route('groups.create') }}" class="btn btn-success btn-sm">Nuevo <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Grupo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($groups as $group)
                                    <tr>
                                        <td>{{ $group->name }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary btn-sm">
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
            </div>
        </div>
    </div>
@endsection