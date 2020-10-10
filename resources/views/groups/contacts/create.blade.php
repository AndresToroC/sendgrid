@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Crear contacto para el grupo: {{ $group->name }}</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['groups.contacts.store', $group->id], 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsText('name') }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsText('email') }}
                            </div>
                        </div>
                        {{ Form::button('Guardar <i class="fas fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) }}
                        <a href="{{ route('groups.contacts.index', $group->id) }}" class="btn btn-dark btn-sm">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection