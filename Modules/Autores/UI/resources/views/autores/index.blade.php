@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Autores</h1>
        <a href="{{ route('autores.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Adicionar Novo Autor
        </a>
    </div>

    @if (count($autores) === 0)
        <div class="alert alert-info" role="alert">
            Nenhum autor cadastrado ainda.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Nome</th>
                        <th style="width: 150px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                        <tr>
                            {{-- <td>{{ $autor['cod_au'] }}</td> --}}
                            <td>{{ $autor['nome'] }}</td>
                            <td>
                                <a href="{{ route('autores.show', $autor['cod_au']) }}" class="btn btn-info btn-sm" title="Ver Detalhes">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('autores.edit', $autor['cod_au']) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('autores.destroy', $autor['cod_au']) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este autor?');">
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

        <div class="d-flex justify-content-center mt-4">
            {{-- {{ $autores->links('pagination::bootstrap-5') }} --}}
        </div>
    @endif
@endsection