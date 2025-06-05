<?php

namespace Tests\Unit\Services;

use App\Exceptions\BibliotecaException;
use App\Helpers\PDF\PdfInterface;
use App\Repositories\BibliotecaViewRepositoryInterface;
use App\Services\BibliotecaViewService;
use Mockery;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BibliotecaServiceTest extends TestCase
{
    private $bibliotecaViewRepository;
    private $pdfHelper;
    private $bibliotecaViewService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bibliotecaViewRepository = Mockery::mock(BibliotecaViewRepositoryInterface::class);
        $this->pdfHelper = Mockery::mock(PdfInterface::class);
        $this->bibliotecaViewService = new BibliotecaViewService($this->bibliotecaViewRepository, $this->pdfHelper);
    }

    public function testExportarPdfWithEmptyData(): void
    {
        $dataCollection = collect([]);
        $this->bibliotecaViewRepository->shouldReceive('exportData')
            ->once()
            ->andReturn($dataCollection);

        $this->expectException(BibliotecaException::class);
        $this->expectExceptionMessage('Não foram encontrados dados para exportação');
        $this->expectExceptionCode(404);

        $this->bibliotecaViewService->exportarPdf();
    }

    public function testExportarPdfSuccess(): void
    {
        $mockData = collect([
            "autor_id" => 2,
            "autor_nome" => "Clarice Lispector",
            "total_livros" => 1,
            "livros_do_autor" => "A Hora da Estrela",
            "assuntos_dos_livros" => "Ficção; História"
        ]);
       $mockResponse = Mockery::mock(BinaryFileResponse::class);
        
        $this->bibliotecaViewRepository->shouldReceive('exportData')
            ->once()
            ->andReturn($mockData);
            
        $this->pdfHelper->shouldReceive('export')
            ->once()
            ->with([
                'namePage' => 'livros.biblioteca',
                'data' => $mockData,
                'filename' => 'relatorio_biblioteca',
                'paper' => 'a4',
                'orientation' => 'landscape'
            ])
            ->andReturn($mockResponse);
            
        $result = $this->bibliotecaViewService->exportarPdf();
        
        $this->assertInstanceOf(BinaryFileResponse::class, $result);
    }
}
