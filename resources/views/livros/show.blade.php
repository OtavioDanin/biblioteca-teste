@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Detalhes do Livro: {{ $livro['titulo'] }}</h2>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Título:</dt>
                <dd class="col-sm-9">{{ $livro['titulo'] }}</dd>

                <dt class="col-sm-3">Editora:</dt>
                <dd class="col-sm-9">{{ $livro['editora'] }}</dd>

                <dt class="col-sm-3">Edição:</dt>
                <dd class="col-sm-9">{{ $livro['edicao'] }}</dd>

                <dt class="col-sm-3">Ano de Publicação:</dt>
                <dd class="col-sm-9">{{ $livro['ano_publicacao'] }}</dd>

                <dt class="col-sm-3">Autores:</dt>
                <dd class="col-sm-9">
                    @forelse ($livro['autores'] as $autor)
                        <span class="badge bg-secondary">{{ $autor['nome'] }}</span>
                    @empty
                        <span class="text-muted">Nenhum autor associado.</span>
                    @endforelse
                </dd>

                <dt class="col-sm-3">Assuntos:</dt>
                <dd class="col-sm-9">
                    @forelse ($livro['assuntos'] as $assunto)
                        <span class="badge bg-info text-dark">{{ $assunto['descricao'] }}</span>
                    @empty
                        <span class="text-muted">Nenhum assunto associado.</span>
                    @endforelse
                </dd>

                <dt class="col-sm-3">Criado em:</dt>
                <dd class="col-sm-9">{{ date('d/m/Y', strtotime($livro['created_at'])) }}</dd>
            </dl>

            <div class="mt-4">
                <a href="{{ route('livros.edit', $livro['codl']) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <form action="{{ route('livros.destroy', $livro['codl']) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este livro? Esta ação é irreversível!');">
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