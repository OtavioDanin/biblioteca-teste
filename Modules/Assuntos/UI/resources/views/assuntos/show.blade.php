@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Detalhes do Assunto: {{ $assunto['descricao'] }}</h2>
            <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9">{{ $assunto['cod_as'] }}</dd>

                <dt class="col-sm-3">Descrição:</dt>
                <dd class="col-sm-9">{{ $assunto['descricao'] }}</dd>

                <dt class="col-sm-3">Criado em:</dt>
                <dd class="col-sm-9">{{ date('d/m/Y', strtotime($assunto['created_at'])) }}</dd>

                <dt class="col-sm-3">Última Atualização:</dt>
                <dd class="col-sm-9">{{ date('d/m/Y', strtotime($assunto['updated_at'])) }}</dd>
            </dl>

            <div class="mt-4">
                <a href="{{ route('assuntos.edit', $assunto['cod_as']) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <form action="{{ route('assuntos.destroy', $assunto['cod_as']) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este assunto? Esta ação é irreversível!');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
