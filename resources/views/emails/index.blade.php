@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Enviar email de prueba</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['groups.sendemails.store', $group->id], 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsText('email') }}
                            </div>
                        </div>
                        {{ Form::button('Enviar email <i class="fas fa-envelope"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) }}
                        <a href="{{ route('groups.index') }}" class="btn btn-dark btn-sm">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection