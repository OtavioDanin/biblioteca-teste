<?php

declare(strict_types=1);

namespace Modules\Livros\UI\Http\Controllers;

use Modules\Livros\Domain\LivroException;
use Modules\Assuntos\Domain\AssuntoServiceInterface;
use Modules\Autores\Domain\AutorServiceInterface;
use Modules\Livros\Domain\LivroServiceInterface;
use Modules\Livros\Application\StoreBookRequest;
use Throwable;
use Illuminate\Database\QueryException;
use Modules\Shares\Infrastructure\LoggerFileTrait;

class LivroController extends Controller
{
    use LoggerFileTrait;

    public function __construct(
        protected LivroServiceInterface $livroService,
        protected AutorServiceInterface $autorService,
        protected AssuntoServiceInterface $assuntoService,
    ) {}

    public function index()
    {
        try {
            $livros = $this->livroService->getAllLivros();
            return view('livrox::livros.index', compact('livros'));
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
            return view('livrox::livros.create', compact('autores', 'assuntos'));
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'create', 'Exception' => 'LivroException']);
            return view('livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'create', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function store(StoreBookRequest $storeBookRequest)
    {
        try {
            $storeBookRequest->validated();
            $this->livroService->save($storeBookRequest->all());
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
            return view('livrox::livros.show', compact('livro'));
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'show', 'Exception' => 'LivroException']);
            return view('livrox::livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'show', 'Exception' => 'Throwable']);
            return view('livrox::livros.problem');
        }
    }

    public function edit(int $id)
    {
        try {
            $livro = $this->livroService->find($id);
            $autores = $this->autorService->getAllAutores();
            $assuntos = $this->assuntoService->getAllAssuntos();
            return view('livrox::livros.edit', compact('livro', 'autores', 'assuntos'));
        } catch (LivroException $livroEx) {
            $this->error("Message: " . $livroEx->getMessage(), ['Metodo' => 'edit', 'Exception' => 'LivroException']);
            return view('livrox::livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'edit', 'Exception' => 'Throwable']);
            return view('livrox::livros.problem');
        }
    }

    public function update(StoreBookRequest $storeBookRequest, int $id)
    {
        try {
            $storeBookRequest->validated();
            $this->livroService->update($id, $storeBookRequest->all());
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
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'update', 'Exception' => 'Throwable']);
            return redirect()->route('livros.index')
                ->with('error', 'Ocorreu um problema na inesperado ao atualizar.');
        }
    }

    public function destroy(int $id)
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
