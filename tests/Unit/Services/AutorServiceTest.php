<?php

namespace Tests\Unit\Services;

use App\Repositories\AutorRepositoryInterface;
use App\Services\AutorService;
use Mockery;
use Tests\TestCase;

class AutorServiceTest extends TestCase
{
    private $autorRepositoryMock;
    private $autorService;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->autorRepositoryMock = Mockery::mock(AutorRepositoryInterface::class);
        $this->autorService = new AutorService($this->autorRepositoryMock);
    }

    public function testGetAllAutores()
    {
        $autoresCollection = collect([['id' => 1, 'nome' => 'Autor Teste']]);
        
        $this->autorRepositoryMock->shouldReceive('getAll')
            ->once()
            ->andReturn($autoresCollection);
            
        $result = $this->autorService->getAllAutores();
        
        $this->assertIsArray($result);
        $this->assertEquals('Autor Teste', $result[0]['nome']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
