<?php

namespace App\Http\Controllers;

use App\Services\LivroServiceInterface;
use Throwable;

class LivroController extends Controller
{
    public function __construct(protected LivroServiceInterface $livroService) {}

    public function index()
    {
        try {
            $livros = $this->livroService->getAllLivros();
            // var_dump($livros);die;
            // return response()->json($livros, 200);
            return view('livros.index', compact('livros'));
        } catch (Throwable $th) {
            var_dump($th->getMessage());die;
        }
    }

    public function create()
    {
         
    }
}
