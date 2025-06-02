@extends('layouts.app')

@section('title', 'Lista de Livros')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Livros</h1>
        <a href="{{ route('livros.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Adicionar Livro
        </a>
    </div>

    <a href="{{ route('exportar') }}" class="btn btn-success me-2">
        <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
    </a>

    @if (count($livros) == 0)
        <div class="alert alert-info" role="alert">
            Nenhum livro cadastrado.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Valor</th>
                        <th>Editora</th>
                        <th>Edição</th>
                        <th>Ano Publicação</th>
                        <th>Autores</th>
                        <th>Assuntos</th>
                        <th style="width: 150px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livros['data'] as $livro)
                        <tr>
                            <td>{{ $livro['titulo'] }}</td>
                            <td>R$ {{ number_format($livro['valor'], 2, ',', '.') }}</td>
                            <td>{{ $livro['editora'] }}</td>
                            <td>{{ $livro['edicao'] }}</td>
                            <td>{{ $livro['ano_publicacao'] }}</td>
                            <td>
                                @forelse ($livro['autores'] as $autor)
                                    <span class="badge bg-secondary">{{ $autor['nome'] }}</span>
                                @empty
                                    <span class="text-muted">Nenhum autor</span>
                                @endforelse
                            </td>
                            <td>
                                @forelse ($livro['assuntos'] as $assunto)
                                    <span class="badge bg-info text-dark">{{ $assunto['descricao'] }}</span>
                                @empty
                                    <span class="text-muted">Nenhum assunto</span>
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ route('livros.show', $livro['codl']) }}" class="btn btn-info btn-sm"
                                    title="Ver Detalhes">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('livros.edit', $livro['codl']) }}" class="btn btn-warning btn-sm"
                                    title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('livros.destroy', $livro['codl']) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="{{ $livros['first_page_url'] }}" tabindex="-1"
                        aria-disabled="true">Previous</a>
                </li>
                @foreach ($livros['links'] as $livro)
                    <li class="page-item"><a class="page-link" href="{{ $livro['url'] }}">1</a></li>
                @endforeach
                <li class="page-item">
                    <a class="page-link" href="{{ $livros['next_page_url'] }}">Next</a>
                </li>
            </ul>
        </nav>
    @endif
@endsection
