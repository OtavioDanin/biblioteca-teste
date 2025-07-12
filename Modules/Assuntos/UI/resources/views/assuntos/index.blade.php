@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Assuntos</h1>
        <a href="{{ route('assuntos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Adicionar
        </a>
    </div>

    @if (count($assuntos) == 0)
        <div class="alert alert-info" role="alert">
            Nenhum assunto cadastrado ainda.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th style="width: 150px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assuntos as $assunto)
                        <tr>
                            <td>{{ $assunto['cod_as'] }}</td>
                            <td>{{ $assunto['descricao'] }}</td>
                            <td>
                                <a href="{{ route('assuntos.show', $assunto['cod_as']) }}" class="btn btn-info btn-sm" title="Ver Detalhes">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('assuntos.edit', $assunto['cod_as']) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('assuntos.destroy', $assunto['cod_as']) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este assunto?');">
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

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $assuntos->links('pagination::bootstrap-5') }}
        </div> --}}
    @endif
@endsection
