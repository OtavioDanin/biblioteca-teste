@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Adicionar Livro</h2>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">
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

            <form action="{{ route('livros.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @csrf
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required maxlength="40">
                </div>
                <div class="mb-3">
                    <label for="Editora" class="form-label">Editora:</label>
                    <input type="text" class="form-control" id="editora" name="editora" value="{{ old('editora') }}" required maxlength="40">
                </div>
                <div class="mb-3">
                    <label for="Edicao" class="form-label">Edição:</label>
                    <input type="number" class="form-control" id="edicao" name="edicao" value="{{ old('edicao') }}" required min="1">
                </div>
                <div class="mb-3">
                    <label for="anoPublicacao" class="form-label">Ano de Publicação:</label>
                    <input type="text" class="form-control" id="anoPublicacao" name="anoPublicacao" value="{{ old('anoPublicacao') }}" required maxlength="4">
                    <small class="form-text text-muted">Ex: 1984</small>
                </div>

                <div class="mb-3">
                    <label for="autores" class="form-label">Autores:</label>
                    <select class="form-select" id="autores" name="autores[]" multiple>
                        @foreach ($autores as $autor)
                            <option value="{{ $autor['cod_au'] }}" {{ in_array($autor['cod_au'], old('autores', [])) ? 'selected' : '' }}>
                                {{ $autor['nome'] }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Mantenha 'Ctrl' (Windows/Linux) ou 'Cmd' (Mac) para selecionar múltiplos.</small>
                </div>

                <div class="mb-3">
                    <label for="assuntos" class="form-label">Assuntos:</label>
                    <select class="form-select" id="assuntos" name="assuntos[]" multiple>
                        @foreach ($assuntos as $assunto)
                            <option value="{{ $assunto['cod_as'] }}" {{ in_array($assunto['cod_as'], old('assuntos', [])) ? 'selected' : '' }}>
                                {{ $assunto['descricao'] }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Mantenha 'Ctrl' (Windows/Linux) ou 'Cmd' (Mac) para selecionar múltiplos.</small>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Salvar Livro
                </button>
            </form>
        </div>
    </div>
@endsection