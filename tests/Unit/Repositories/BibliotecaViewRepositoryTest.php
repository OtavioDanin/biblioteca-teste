<?php

namespace Tests\Unit\Repositories;

use App\Models\BibliotecaView;
use App\Repositories\BibliotecaViewRepository;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use Tests\TestCase;

class BibliotecaViewRepositoryTest extends TestCase
{
    private $bibliotecaView;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->bibliotecaView = Mockery::mock(BibliotecaView::class);
    }

    public function testExportData(): void
    {
        $this->bibliotecaView->shouldReceive('orderBy')
            ->with('autor_nome')
            ->once()
            ->andReturnSelf();

        $this->bibliotecaView->shouldReceive('get')
            ->once()
            ->andReturn(new Collection());

        $autorRepository = new BibliotecaViewRepository($this->bibliotecaView);
        $result = $autorRepository->exportData();
        $this->assertInstanceOf(Collection::class, $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
