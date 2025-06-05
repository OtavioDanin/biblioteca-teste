<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\BibliotecaException;
use App\Helpers\PDF\PdfHelper;
use App\Services\BibliotecaViewService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;
use Throwable;

class BibliotecaViewController extends Controller
{
    use \App\Traits\LoggerFile;

    public function __construct(
        protected BibliotecaViewService $bibliotecaViewService,
        protected PdfHelper $pdf,
    ) {}

    public function exportarPdf()
    {
        try {
            return $this->bibliotecaViewService->exportarPdf();
        } catch(BibliotecaException $bliEx) {
            $this->error("Message: " . $bliEx->getMessage(), ['Metodo' => 'exportarPdf', 'Exception' => 'BibliotecaException']);
            return redirect()->route('livros.index')
                ->with('error', $bliEx->getMessage());
        } catch (QueryException $queEX) {
            $this->emergency("Message: " . $queEX->getMessage(), ['Metodo' => 'exportarPdf', 'Exception' => 'QueryException']);
            return redirect()->route('livros.index')
                ->with('error', 'Falha durante a exportação DO PDF');
        } catch (Throwable $th) {
            $this->emergency("Message: " . $th->getMessage(), ['Metodo' => 'exportarPdf', 'Exception' => 'Throwable']);
            return redirect()->route('livros.index')
                ->with('error', 'Falha inesperada durante a exportação do PDF');
        }
    }
}
