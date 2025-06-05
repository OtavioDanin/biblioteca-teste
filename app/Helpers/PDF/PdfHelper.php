<?php

declare(strict_types=1);

namespace App\Helpers\PDF;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfHelper implements PdfInterface
{
    public function __construct(protected Pdf $pdf) {}

    public function export(array $params = [])
    {
        $data = $params['data'];
        $pdf = $this->pdf::loadView($params['namePage'], compact('data'));

        $pdf->setPaper($params['paper'], $params['orientation']);
        return $pdf->download($params['filename'] . '.pdf');
    }
}
