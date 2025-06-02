<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\BibliotecaView;
use Barryvdh\DomPDF\Facade\Pdf;

class BibliotecaViewController extends Controller
{
    public function exportarPdf()
    {
        $autoresInfo = BibliotecaView::orderBy('autor_nome')->get();
        $pdf = Pdf::loadView('livros.biblioteca', compact('autoresInfo'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('relatorio_biblioteca.pdf');
    }
}