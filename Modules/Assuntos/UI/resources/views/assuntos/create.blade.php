@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Adicionar Novo Assunto</h2>
            <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('assuntos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Descricao" class="form-label">Descrição do Assunto:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}" required maxlength="20">
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Salvar Assunto
                </button>
            </form>
        </div>
    </div>
@endsection