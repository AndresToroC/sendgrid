@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Crear grupo</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'groups.store', 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsText('name') }}
                            </div>
                        </div>
                        {{ Form::button('Guardar <i class="fas fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) }}
                        <a href="{{ route('groups.index') }}" class="btn btn-dark btn-sm">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection