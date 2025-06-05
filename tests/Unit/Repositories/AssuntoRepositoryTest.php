<?php

namespace Tests\Unit\Repositories;

use App\Models\Assunto;
use App\Repositories\AssuntoRepository;
use Mockery;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;

class AssuntoRepositoryTest extends TestCase
{
    private $mockAssuntoModel;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockAssuntoModel = Mockery::mock(Assunto::class);
    }

    public function testGetAll(): void
    {
        $this->mockAssuntoModel->shouldReceive('orderBy')
            ->with('cod_as')
            ->once()
            ->andReturnSelf();

        $this->mockAssuntoModel->shouldReceive('get')
            ->once()
            ->andReturn(new Collection());

        $assuntoRepository = new AssuntoRepository($this->mockAssuntoModel);
        $result = $assuntoRepository->getAll();
        $this->assertInstanceOf(Collection::class, $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
