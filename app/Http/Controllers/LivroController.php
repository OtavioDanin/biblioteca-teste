<?php

namespace App\Http\Controllers;

use App\DTO\LivroDTO;
use App\Services\AssuntoServiceInterface;
use App\Services\AutorServiceInterface;
use App\Services\LivroServiceInterface;
use Illuminate\Http\Request;

use Throwable;

class LivroController extends Controller
{
    public function __construct(
        protected LivroServiceInterface $livroService,
        protected AutorServiceInterface $autorService,
        protected AssuntoServiceInterface $assuntoService,
        protected LivroDTO $livroDTO,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $livros = $this->livroService->getAllLivros();
            return view('livros.index', compact('livros'));
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $autores = $this->autorService->getAllAutores();
            $assuntos = $this->assuntoService->getAllAssuntos();
            return view('livros.create', compact('autores', 'assuntos'));
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:40',
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
        } catch (Throwable $th) {
            var_dump($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $livro = $this->livroService->find($id);
            return view('livros.show', compact('livro'));
        } catch (Throwable $th) {
            $th->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $livro = $this->livroService->find($id);
            $autores = $this->autorService->getAllAutores();
            $assuntos = $this->assuntoService->getAllAssuntos();
            return view('livros.edit', compact('livro', 'autores', 'assuntos'));
        } catch (Throwable $th) {
            var_dump($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:40',
                'editora' => 'required|string|max:40',
                'edicao' => 'required|integer|min:1',
                'anoPublicacao' => 'required|string|max:4',
                'autores' => 'nullable|array',
                'autores.*' => 'exists:autores,cod_au',
                'assuntos' => 'nullable|array',
                'assuntos.*' => 'exists:assuntos,cod_as',
            ]);
            $this->livroService->update($id, $request->all());
            return redirect()->route('livros.index')
                ->with('success', 'Livro atualizado com sucesso!');
        } catch (Throwable $th) {
            var_dump($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->livroService->destroy($id);
            return redirect()->route('livros.index')
                ->with('success', 'Livro excluído com sucesso!');
        } catch (Throwable $th) {
            var_dump($th->getMessage());
        }
    }
}
