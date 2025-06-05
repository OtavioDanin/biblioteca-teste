<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\BibliotecaException;
use App\Helpers\PDF\PdfInterface;
use App\Repositories\BibliotecaViewRepositoryInterface;

class BibliotecaViewService
{
    public function __construct(
        protected BibliotecaViewRepositoryInterface $bibliotecaViewRepository,
        protected PdfInterface $pdf
    ) {}

    public function exportarPdf()
    {
        $dataView = $this->bibliotecaViewRepository->exportData();
        if ($dataView->isEmpty()) {
            throw new BibliotecaException('Não foram encontrados dados para exportação.', 404);
        }
        $params = ['namePage' => 'livros.biblioteca', 'data' => $dataView, 'filename' => 'relatorio_biblioteca' , 'paper' => 'a4', 'orientation' => 'landscape' ];
        return $this->pdf->export($params);
    }
}
