<?php

namespace App\Http\Controllers;

use App\DTO\LivroDTO;
use App\Exceptions\LivroException;
use App\Services\AssuntoServiceInterface;
use App\Services\AutorServiceInterface;
use App\Services\LivroServiceInterface;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Database\QueryException;

class LivroController extends Controller
{
    use \App\Traits\LoggerFile;

    public function __construct(
        protected LivroServiceInterface $livroService,
        protected AutorServiceInterface $autorService,
        protected AssuntoServiceInterface $assuntoService,
        protected LivroDTO $livroDTO,
    ) {}

    public function index()
    {
        try {
            $livros = $this->livroService->getAllLivros();
            return view('livros.index', compact('livros'));
        } catch (Throwable $th) {
            $this->error("Message: " . $th->getMessage(), ['Metodo' => 'index', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function create()
    {
        try {
            $autores = $this->autorService->getAllAutores();
            $assuntos = $this->assuntoService->getAllAssuntos();
            return view('livros.create', compact('autores', 'assuntos'));
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'create', 'Exception' => 'LivroException']);
            return view('livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'create', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:40',
                'valor' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
                'editora' => 'required|string|max:40',
                'edicao' => 'required|integer|min:1',
                'anoPublicacao' => 'required|string|max:4',
                'autores' => 'nullable|array',
                'autores.*' => 'exists:autores,cod_au',
                'assuntos' => 'nullable|array',
                'assuntos.*' => 'exists:assuntos,cod_as',
            ]);

            $livroDTO = $this->livroDTO->create($request->all());
            $this->livroService->save($livroDTO);

            return redirect()->route('livros.index')
                ->with('success', 'Livro criado com sucesso!');
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'store', 'Exception' => 'LivroException']);
            return redirect()->route('livros.index')
                ->with('error', 'Falha no cadastro.');
        } catch (QueryException $qEx) {
            $this->emergency("Message: " . $qEx->getMessage(), ['Metodo' => 'store', 'Exception' => 'QueryException']);
            return redirect()->route('livros.index')
                ->with('error', 'Ocorreu um problema durante o Cadastro.  Tente novamente.');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'store', 'Exception' => 'Throwable']);
            return redirect()->route('livros.index')
                ->with('error', 'Ocorreu um problema na inesperado ao cadastrar o livro.');
        }
    }

    public function show(int $id)
    {
        try {
            $livro = $this->livroService->find($id);
            return view('livros.show', compact('livro'));
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'show', 'Exception' => 'LivroException']);
            return view('livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'show', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function edit(string $id)
    {
        try {
            $livro = $this->livroService->find($id);
            $autores = $this->autorService->getAllAutores();
            $assuntos = $this->assuntoService->getAllAssuntos();
            return view('livros.edit', compact('livro', 'autores', 'assuntos'));
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'edit', 'Exception' => 'LivroException']);
            return view('livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'edit', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:40',
                'valor' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
                'editora' => 'required|string|max:40',
                'edicao' => 'required|integer|min:1',
                'anoPublicacao' => 'required|string|max:4',
                'autores' => 'nullable|array',
                'autores.*' => 'exists:autores,cod_au',
                'assuntos' => 'nullable|array',
                'assuntos.*' => 'exists:assuntos,cod_as',
            ]);
            $livroDTO = $this->livroDTO->create($request->all());
            $this->livroService->update($id, $livroDTO);
            return redirect()->route('livros.index')
                ->with('success', 'Livro atualizado com sucesso!');
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'update', 'Exception' => 'LivroException']);
            return redirect()->route('livros.index')
                ->with('error', 'Problema na atualização.');
        } catch (QueryException $qEx) {
            $this->emergency("Message: " . $qEx->getMessage(), ['Metodo' => 'update', 'Exception' => 'QueryException']);
            return redirect()->route('livros.index')
                ->with('error', 'Ocorreu um problema durante a atualização. Tente novamente.');
        } catch (Throwable $th) {
            var_dump(get_class($th));
            die;
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'update', 'Exception' => 'Throwable']);
            return redirect()->route('livros.index')
                ->with('error', 'Ocorreu um problema na inesperado ao atualizar.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->livroService->destroy($id);
            return redirect()->route('livros.index')
                ->with('success', 'Livro excluído com sucesso!');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'destroy', 'Exception' => 'Throwable']);
            return redirect()->route('livros.index')
                ->with('error', 'Ocorreu um problema na inesperado ao excluir o Livro.');
        }
    }
}
