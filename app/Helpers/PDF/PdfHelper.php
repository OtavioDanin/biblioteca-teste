<?php

declare(strict_types=1);

namespace App\Helpers\PDF;

use Barryvdh\DomPDF\Facade\Pdf;

class PdfHelper implements PdfInterface
{
    public function export(array $params = [])
    {
        $data = $params['data'];
        $pdf = Pdf::loadView($params['namePage'], compact('data'));

        $pdf->setPaper($params['paper'], $params['orientation']);
        return $pdf->download($params['filename'] . '.pdf');
    }
}
