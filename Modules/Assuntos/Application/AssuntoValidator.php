<?php

declare(strict_types=1);

namespace Modules\Assuntos\Application;

use Modules\Assuntos\Domain\AssuntoException;
use Modules\Assuntos\Domain\AssuntoRepositoryInterface;
use Modules\Assuntos\Domain\AssuntoValidatorInterface;

class AssuntoValidator implements AssuntoValidatorInterface
{
    public function __construct(
        private AssuntoRepositoryInterface $assuntoRepository
    ) {}

    public function validate(object $data): void
    {
        $data->validate([
            'descricao' => 'required|string|max:20',
        ]);
    }

    public function validateRuleDelete(int $id): void
    {
        if ($this->assuntoRepository->isLinkedToBooks($id)) {
            throw new AssuntoException(
                'Não é possível remover assunto vinculado a um ou mais livros.'
            );
        }
    }
}
