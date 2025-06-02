<?php

namespace Tests\Unit\Services;

use App\Repositories\AssuntoRepositoryInterface;
use App\Services\AssuntoService;
use Mockery;
use Tests\TestCase;

class AssuntoServiceTest extends TestCase
{
    private $assuntoRepositoryMock;
    private $assuntoService;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->assuntoRepositoryMock = Mockery::mock(AssuntoRepositoryInterface::class);
        $this->assuntoService = new AssuntoService($this->assuntoRepositoryMock);
    }

    public function testGetAllAssuntos()
    {
        $assuntosCollection = collect([['id' => 1, 'descricao' => 'Assunto Teste']]);
        
        $this->assuntoRepositoryMock->shouldReceive('getAll')
            ->once()
            ->andReturn($assuntosCollection);
            
        $result = $this->assuntoService->getAllAssuntos();
        
        $this->assertIsArray($result);
        $this->assertEquals('Assunto Teste', $result[0]['descricao']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
