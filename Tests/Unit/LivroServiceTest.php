<?php

namespace Tests\Unit;

use App\Exceptions\LivroException;
use App\Models\Livro; // Necessário para simular o modelo retornado
use App\Repositories\LivroRepositoryInterface;
use App\Services\LivroService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase; // Ou use Tests\TestCase se precisar do ambiente Laravel completo

class LivroServiceTest extends TestCase
{
    protected $livroRepositoryMock;
    protected LivroService $livroService;

    protected function setUp(): void
    {
        parent::setUp();

        // Cria um mock para LivroRepositoryInterface
        $this->livroRepositoryMock = $this->createMock(LivroRepositoryInterface::class);

        // Instancia o LivroService com o mock do repositório
        $this->livroService = new LivroService($this->livroRepositoryMock);

        // Mock da Facade DB para testar transações
        // Isso permite que o código dentro da transação seja executado no teste.
        DB::shouldReceive('transaction')
            ->andReturnUsing(function ($callback) {
                // Simula a execução da closure da transação
                $callback();
            });
    }

    /** @test */
    public function test_it_can_get_all_livros(): void
    {
        // Define o comportamento esperado do mock do repositório
        $livrosCollection = new Collection([
            (object)['Codl' => 1, 'Titulo' => 'Livro A'],
            (object)['Codl' => 2, 'Titulo' => 'Livro B'],
        ]);
        $this->livroRepositoryMock->expects($this->once())
            ->method('getAll')
            ->willReturn($livrosCollection);

        // Chama o método do serviço
        $result = $this->livroService->getAllLivros();

        // Asserts
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('Livro A', $result[0]->Titulo);
    }

    /** @test */
    public function it_can_save_a_livro_with_relations(): void
    {
        $livroData = [
            'Titulo' => 'Novo Livro',
            'Editora' => 'Editora Teste',
            'Edicao' => 1,
            'AnoPublicacao' => '2023',
            'autores' => [1, 2],
            'assuntos' => [3, 4],
        ];

        // Cria um mock para o modelo Livro que será retornado por persist()
        $livroModelMock = $this->createMock(Livro::class);

        // Moca os métodos de relacionamento attach() no modelo Livro
        $livroModelMock->expects($this->once())
            ->method('autores')
            ->willReturn($this->getMockBuilder(\stdClass::class)->addMethods(['attach'])->getMock());
        $livroModelMock->autores()->expects($this->once())
            ->method('attach')
            ->with($livroData['autores']);

        $livroModelMock->expects($this->once())
            ->method('assuntos')
            ->willReturn($this->getMockBuilder(\stdClass::class)->addMethods(['attach'])->getMock());
        $livroModelMock->assuntos()->expects($this->once())
            ->method('attach')
            ->with($livroData['assuntos']);


        // Define o comportamento esperado para o método persist() do repositório
        $this->livroRepositoryMock->expects($this->once())
            ->method('persist')
            ->with($livroData)
            ->willReturn($livroModelMock);

        // Chama o método do serviço
        $this->livroService->save($livroData);

        // Nenhuma asserção direta de retorno para void,
        // apenas verificamos que os mocks foram chamados conforme o esperado.
    }

    /** @test */
    public function it_throws_exception_when_saving_empty_livro_data(): void
    {
        $this->expectException(LivroException::class);
        $this->expectExceptionMessage('Não existe livro para ser inserido.');
        $this->expectExceptionCode(500);

        $this->livroService->save([]);
    }

    /** @test */
    public function it_can_find_a_livro_by_id(): void
    {
        $livroId = 1;
        $livroModelMock = $this->createMock(Livro::class);
        $livroModelMock->method('toArray')->willReturn(['Codl' => $livroId, 'Titulo' => 'Livro Encontrado']);

        $this->livroRepositoryMock->expects($this->once())
            ->method('findById')
            ->with($livroId)
            ->willReturn($livroModelMock);

        $result = $this->livroService->find($livroId);

        $this->assertIsArray($result);
        $this->assertEquals($livroId, $result['Codl']);
        $this->assertEquals('Livro Encontrado', $result['Titulo']);
    }

    /** @test */
    public function it_throws_exception_when_finding_empty_id(): void
    {
        $this->expectException(LivroException::class);
        $this->expectExceptionMessage('Livro sem código.');
        $this->expectExceptionCode(500);

        $this->livroService->find(0); // Teste com 0 ou null, dependendo do tipo esperado
    }

    /** @test */
    public function it_throws_exception_when_livro_not_found(): void
    {
        $this->expectException(LivroException::class);
        $this->expectExceptionMessage('Livro não encontrado.');
        $this->expectExceptionCode(404);

        $livroModelMock = $this->createMock(Livro::class);
        $livroModelMock->method('toArray')->willReturn([]); // Simula livro não encontrado

        $this->livroRepositoryMock->expects($this->once())
            ->method('findById')
            ->with(999) // Um ID que não seria encontrado
            ->willReturn($livroModelMock);

        $this->livroService->find(999);
    }

    /** @test */
    public function it_can_update_a_livro_with_relations(): void
    {
        $livroId = 1;
        $livroData = [
            'Titulo' => 'Livro Atualizado',
            'Editora' => 'Editora Nova',
            'Edicao' => 2,
            'AnoPublicacao' => '2024',
            'autores' => [5],
            'assuntos' => [6],
        ];

        $livroModelMock = $this->createMock(Livro::class);

        // Moca os métodos de relacionamento sync() no modelo Livro
        $livroModelMock->expects($this->once())
            ->method('autores')
            ->willReturn($this->getMockBuilder(\stdClass::class)->addMethods(['sync'])->getMock());
        $livroModelMock->autores()->expects($this->once())
            ->method('sync')
            ->with($livroData['autores']);

        $livroModelMock->expects($this->once())
            ->method('assuntos')
            ->willReturn($this->getMockBuilder(\stdClass::class)->addMethods(['sync'])->getMock());
        $livroModelMock->assuntos()->expects($this->once())
            ->method('sync')
            ->with($livroData['assuntos']);

        // Define o comportamento esperado para o método update() do repositório
        $this->livroRepositoryMock->expects($this->once())
            ->method('update')
            ->with($livroId, $livroData)
            ->willReturn($livroModelMock);

        $this->livroService->update($livroId, $livroData);
    }

    /** @test */
    public function it_throws_exception_when_updating_empty_livro_data(): void
    {
        $this->expectException(LivroException::class);
        $this->expectExceptionMessage('Não há livros para atualizar.');
        $this->expectExceptionCode(500);

        $this->livroService->update(1, []);
    }

    /** @test */
    public function it_can_destroy_a_livro_with_relations(): void
    {
        $livroId = 1;

        $livroModelMock = $this->createMock(Livro::class);

        // Moca os métodos de relacionamento detach() no modelo Livro
        $livroModelMock->expects($this->once())
            ->method('autores')
            ->willReturn($this->getMockBuilder(\stdClass::class)->addMethods(['detach'])->getMock());
        $livroModelMock->autores()->expects($this->once())
            ->method('detach');

        $livroModelMock->expects($this->once())
            ->method('assuntos')
            ->willReturn($this->getMockBuilder(\stdClass::class)->addMethods(['detach'])->getMock());
        $livroModelMock->assuntos()->expects($this->once())
            ->method('detach');

        // Define o comportamento esperado para o método delete() do repositório
        $this->livroRepositoryMock->expects($this->once())
            ->method('delete')
            ->with($livroId)
            ->willReturn($livroModelMock); // O método delete retorna o modelo Livro deletado

        $this->livroService->destroy($livroId);
    }
}
