<?php

declare(strict_types=1);

namespace Modules\Assuntos\UI\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\Assuntos\Domain\AssuntoException;
use Modules\Assuntos\Domain\AssuntoServiceInterface;
use Modules\Assuntos\Domain\AssuntoValidatorInterface;
use Modules\Assuntos\DTOs\AssuntoDTO;
use Throwable;
use Modules\Shares\Infrastructure\LoggerFileTrait;

class AssuntoController extends Controller
{
    use LoggerFileTrait;

    public function __construct(
        protected AssuntoServiceInterface $assuntoService,
        protected AssuntoDTO $dto,
        protected AssuntoValidatorInterface $validator,
    ) {}

    public function index()
    {
        try {
            $assuntos = $this->assuntoService->getAllAssuntos();
            return view('assuntox::assuntos.index', compact('assuntos'));
        } catch (Throwable $th) {
            $this->error("Message: " . $th->getMessage(), ['Metodo' => 'index', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function show(int $id)
    {
        try {
            $assunto = $this->assuntoService->findById($id);
            return view('assuntox::assuntos.show', compact('assunto'));
        } catch (Throwable $th) {
            $this->error("Message: " . $th->getMessage(), ['Metodo' => 'show', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function edit(int $id)
    {
        try {
            $assunto = $this->assuntoService->findById($id);
            return view('assuntox::assuntos.edit', compact('assunto'));
        } catch (AssuntoException $assuntoEx) {
            $this->error("Message: " . $assuntoEx->getMessage(), ['Metodo' => 'edit', 'Exception' => 'LivroException']);
            return view('livrox::livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'edit', 'Exception' => 'Throwable']);
            return view('livrox::livros.problem');
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $this->validator->validate($request);
            $assuntoDTO = $this->dto::from($request->all())->all();
            $this->assuntoService->update($id, $assuntoDTO);
            return redirect()->route('assuntos.index')
                ->with('success', 'Assunto atualizado com sucesso!');
        } catch (AssuntoException $assuntoEx) {
            $this->error("Message: " . $assuntoEx->getMessage(), ['Metodo' => 'update', 'Exception' => 'LivroException']);
            return redirect()->route('assuntos.index')
                ->with('error', 'Problema na atualização.');
        } catch (QueryException $qEx) {
            $this->emergency("Message: " . $qEx->getMessage(), ['Metodo' => 'update', 'Exception' => 'QueryException']);
            return redirect()->route('assuntos.index')
                ->with('error', 'Ocorreu um problema durante a atualização. Tente novamente.');
        } catch (ValidationException $vaException) {
            $this->error("Message: " . $vaException->getMessage(), ['Metodo' => 'update', 'Exception' => 'ValidationException']);
            return redirect()->route('assuntos.index')
                ->with('error', 'O campo descrição é obrigatório e não deve ter mais de 20 caracteres.');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'update', 'Exception' => 'Throwable']);
            return redirect()->route('assuntos.index')
                ->with('error', 'Ocorreu um problema na inesperado ao atualizar.');
        }
    }

    public function create()
    {
        try {
            $assuntos = $this->assuntoService->getAllAssuntos();
            return view('assuntox::assuntos.create', compact('assuntos'));
        } catch (AssuntoException $assontoEx) {
            $this->error("Message: " . $assontoEx->getMessage(), ['Metodo' => 'create', 'Exception' => 'AssuntoException']);
            return view('livros.problem');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'create', 'Exception' => 'Throwable']);
            return view('livros.problem');
        }
    }

    public function store(Request $request)
    {
        try {
            $this->validator->validate($request);
            $assuntoDTO = $this->dto::from($request->all())->all();
            $this->assuntoService->save($assuntoDTO);
            return redirect()->route('assuntos.index')
                ->with('success', 'Assunto criado com sucesso!');
        } catch (ValidationException $validationEx) {
            $this->error("Message: " . $validationEx->getMessage(), ['Metodo' => 'store', 'Exception' => 'ValidationException']);
            return redirect()->route('assuntos.index')
                ->with('error', 'O campo descrição é obrigatório e não deve ter mais de 20 caracteres.');
        } catch (AssuntoException $assuntoEx) {
            $this->error("Message: " . $assuntoEx->getMessage(), ['Metodo' => 'store', 'Exception' => 'AssuntoException']);
            return redirect()->route('assuntos.index')
                ->with('error', 'Falha no cadastro.');
        } catch (QueryException $qEx) {
            $this->emergency("Message: " . $qEx->getMessage(), ['Metodo' => 'store', 'Exception' => 'QueryException']);
            return redirect()->route('assuntos.index')
                ->with('error', $qEx->getMessage());
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'store', 'Exception' => 'Throwable']);
            return redirect()->route('assuntos.index')
                ->with('error', 'Ocorreu um problema na inesperado ao cadastrar o livro.');
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->validator->validateRuleDelete($id);
            $this->assuntoService->destroy($id);
            return redirect()->route('assuntos.index')
                ->with('success', 'Assunto excluído com sucesso!');
        } catch (AssuntoException $assuntoEx) {
            $this->error("Message: " . $assuntoEx->getMessage(), ['Metodo' => 'delete', 'Exception' => 'AssuntoException']);
            return redirect()->route('assuntos.index')
                ->with('error', $assuntoEx->getMessage());
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'destroy', 'Exception' => 'Throwable']);
            return redirect()->route('assuntos.index')
                ->with('error', 'Ocorreu um problema na inesperado ao excluir o Livro.');
        }
    }
}
