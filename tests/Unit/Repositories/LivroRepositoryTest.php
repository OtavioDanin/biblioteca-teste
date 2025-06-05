<?php

namespace Tests\Unit\Repositories;

use App\Models\Livro;
use App\Repositories\LivroRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Tests\TestCase;

class LivroRepositoryTest extends TestCase
{
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    private $livroMock;
    private $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->livroMock = Mockery::mock(Livro::class);
        $this->repository = new LivroRepository($this->livroMock);
    }

    public function testGetAll()
    {
        $paginator = Mockery::mock(LengthAwarePaginator::class);

        $this->livroMock->shouldReceive('with')
            ->with(['autores', 'assuntos'])
            ->once()
            ->andReturnSelf();

        $this->livroMock->shouldReceive('orderBy')
            ->with('codl', 'desc')
            ->once()
            ->andReturnSelf();

        $this->livroMock->shouldReceive('paginate')
            ->with(15)
            ->once()
            ->andReturn($paginator);

        $result = $this->repository->getAll();
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
    }

    public function testFindById()
    {
        $livro = Mockery::mock(Livro::class);
        $id = 1;

        $this->livroMock->shouldReceive('with')
            ->with(['autores', 'assuntos'])
            ->once()
            ->andReturnSelf();

        $this->livroMock->shouldReceive('find')
            ->with($id)
            ->once()
            ->andReturn($livro);

        $result = $this->repository->findById($id);
        $this->assertInstanceOf(Livro::class, $result);
    }

    public function testFindByIdReturnsNull()
    {
        $id = 0;

        $this->livroMock->shouldReceive('with')
            ->with(['autores', 'assuntos'])
            ->once()
            ->andReturnSelf();

        $this->livroMock->shouldReceive('find')
            ->with($id)
            ->once()
            ->andReturnNull();

        $result = $this->repository->findById($id);

        $this->assertNull($result);
    }

    public function testPersist()
    {
        $data = [
            'titulo' => 'Livro Teste',
            'valor' => 29.99,
            'editora' => 'Editora Teste',
            'edicao' => 1,
            'anopublicacao' => 1999
        ];

        $livro = Mockery::mock(Livro::class);

        $this->livroMock->shouldReceive('create')
            ->with($data)
            ->once()
            ->andReturn($livro);

        $result = $this->repository->persist($data);
        $this->assertInstanceOf(Livro::class, $result);
    }

    public function testUpdate()
    {
        $id = 1;
        $data = ['titulo' => 'Novo Título'];

        $livro = Mockery::mock(Livro::class);
        $livro->shouldReceive('update')
            ->with($data)
            ->once()
            ->andReturn(true);

        $this->livroMock->shouldReceive('with')
            ->with(['autores', 'assuntos'])
            ->once()
            ->andReturnSelf();

        $this->livroMock->shouldReceive('find')
            ->with($id)
            ->once()
            ->andReturn($livro);

        $result = $this->repository->update($id, $data);
        $this->assertInstanceOf(Livro::class, $result);
    }

    public function testDelete()
    {
        $id = 1;

        $livro = Mockery::mock(Livro::class);
        $livro->shouldReceive('delete')
            ->once()
            ->andReturn(true);

        $this->livroMock->shouldReceive('with')
            ->with(['autores', 'assuntos'])
            ->once()
            ->andReturnSelf();

        $this->livroMock->shouldReceive('find')
            ->with($id)
            ->once()
            ->andReturn($livro);

        $result = $this->repository->delete($id);

        $this->assertInstanceOf(Livro::class, $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
