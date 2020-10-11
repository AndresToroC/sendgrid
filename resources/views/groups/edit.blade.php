@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Editar grupo</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['groups.update', $group->id], 'method' => 'PUT']) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsText('name', $group->name) }}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">Tema</label>
                                    <textarea id="summernote" name="theme">
                                        {{ $group->theme }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        {{ Form::button('Actualizar <i class="fas fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) }}
                        <a href="{{ route('groups.index') }}" class="btn btn-dark btn-sm">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection