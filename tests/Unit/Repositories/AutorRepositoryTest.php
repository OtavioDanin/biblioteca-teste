<?php

namespace Tests\Unit\Repositories;

use App\Models\Autor;
use App\Repositories\AutorRepository;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use Tests\TestCase;

class AutorRepositoryTest extends TestCase
{
    private $mockAutorModel;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockAutorModel = Mockery::mock(Autor::class);
    }

    public function testGetAll()
    {
        $this->mockAutorModel->shouldReceive('orderBy')
            ->with('cod_au')
            ->once()
            ->andReturnSelf();

        $this->mockAutorModel->shouldReceive('get')
            ->once()
            ->andReturn(new Collection());

        $autorRepository = new AutorRepository($this->mockAutorModel);
        $result = $autorRepository->getAll();
        $this->assertInstanceOf(Collection::class, $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
