<?php

namespace Tests\Unit\Services;

use App\Exceptions\LivroException;
use App\Repositories\LivroRepositoryInterface;
use App\Services\LivroService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Mockery;
use Tests\TestCase;

class LivroServiceTest extends TestCase
{
    private $livroRepositoryMock;
    private $livroService;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->livroRepositoryMock = Mockery::mock(LivroRepositoryInterface::class);
        $this->livroService = new LivroService($this->livroRepositoryMock);
    }

    public function testGetAllLivros()
    {
        $livrosCollection = collect([['id' => 1, 'titulo' => 'Livro Teste']]);
        
        $this->livroRepositoryMock->shouldReceive('getAll')
            ->once()
            ->andReturn($livrosCollection);
            
        $result = $this->livroService->getAllLivros();
        
        $this->assertIsArray($result);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals('Livro Teste', $result[0]['titulo']);
    }

    public function testSaveLivroSuccess()
    {
        $livroData = [
            'titulo' => 'Novo Livro',
            'autores' => [1, 2],
            'assuntos' => [3, 4]
        ];
        
        $livroModel = Mockery::mock(Model::class);
        $livroModel->shouldReceive('autores->attach');
        $livroModel->shouldReceive('assuntos->attach');
        
        $this->livroRepositoryMock->shouldReceive('persist')
            ->with($livroData)
            ->andReturn($livroModel);
            
        DB::shouldReceive('transaction')
            ->once()
            ->andReturnUsing(function ($callback) {
                return $callback();
            });
            
        $this->livroService->save($livroData);
        
        $this->assertTrue(true);
    }

    public function testSaveLivroWithEmptyData()
    {
        $this->expectException(LivroException::class);
        $this->expectExceptionMessage('Não existe livro para ser inserido.');
        
        $this->livroService->save([]);
    }

    public function testFindLivroSuccess()
    {
        $livroModel = Mockery::mock(Model::class);
        $livroModel->shouldReceive('toArray')
            ->andReturn(['id' => 1, 'titulo' => 'Livro Encontrado']);
            
        $this->livroRepositoryMock->shouldReceive('findById')
            ->with(1)
            ->andReturn($livroModel);
            
        $result = $this->livroService->find(1);
        
        $this->assertIsArray($result);
        $this->assertEquals('Livro Encontrado', $result['titulo']);
    }

    public function testFindLivroNotFound()
    {
        $this->expectException(LivroException::class);
        $this->expectExceptionMessage('Livro não encontrado.');
        
        $livroModel = Mockery::mock(Model::class);
        $livroModel->shouldReceive('toArray')
            ->andReturn([]);
            
        $this->livroRepositoryMock->shouldReceive('findById')
            ->with(999)
            ->andReturn($livroModel);
            
        $this->livroService->find(999);
    }

    public function testUpdateLivroSuccess()
    {
        $livroData = [
            'titulo' => 'Livro Atualizado',
            'autores' => [1, 2],
            'assuntos' => [3, 4]
        ];
        
        $livroModel = Mockery::mock(Model::class);
        $livroModel->shouldReceive('autores->sync');
        $livroModel->shouldReceive('assuntos->sync');
        
        $this->livroRepositoryMock->shouldReceive('update')
            ->with(1, $livroData)
            ->andReturn($livroModel);
            
        DB::shouldReceive('transaction')
            ->once()
            ->andReturnUsing(function ($callback) {
                return $callback();
            });
            
        $this->livroService->update(1, $livroData);
        
        $this->assertTrue(true);
    }

    public function testDestroyLivroSuccess()
    {
        $livroModel = Mockery::mock(Model::class);
        $livroModel->shouldReceive('autores->detach');
        $livroModel->shouldReceive('assuntos->detach');
        
        $this->livroRepositoryMock->shouldReceive('delete')
            ->with(1)
            ->andReturn($livroModel);
            
        DB::shouldReceive('transaction')
            ->once()
            ->andReturnUsing(function ($callback) {
                return $callback();
            });
            
        $this->livroService->destroy(1);
        
        $this->assertTrue(true);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
