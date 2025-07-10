<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Autores, Livros e Assuntos</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .badge {
            display: inline-block;
            padding: .35em .65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            margin-right: 5px;
            margin-bottom: 3px;
        }

        .bg-primary {
            background-color: #0d6efd;
        }

        .bg-info {
            background-color: #0dcaf0;
            color: #000;
        }

        .text-muted {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <h1>Relatório da exportação dos dados da Biblioteca</h1>

    <table>
        <thead>
            <tr>
                <th>Nome do Autor</th>
                <th>Total de Livros</th>
                <th>Títulos dos Livros</th>
                <th>Assuntos Abrangidos</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $autor)
                <tr>
                    <td>{{ $autor->autor_nome }}</td>
                    <td>{{ $autor->total_livros }}</td>
                    <td>
                        @if ($autor->livros_do_autor)
                            @foreach (explode('; ', $autor->livros_do_autor) as $livroTitulo)
                                <span class="badge bg-primary">{{ $livroTitulo }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">Nenhum livro</span>
                        @endif
                    </td>
                    <td>
                        @if ($autor->assuntos_dos_livros)
                            @foreach (explode('; ', $autor->assuntos_dos_livros) as $assuntoDescricao)
                                <span class="badge bg-info">{{ $assuntoDescricao }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">Nenhum assunto</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum dado de autor, livro e assunto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
