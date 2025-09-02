<?php

declare(strict_types=1);

namespace Modules\Assuntos\Domain;

class AssuntoRulesService implements AssuntoRulesServiceInterface
{
    public function __construct(
        private AssuntoRepositoryInterface $assuntoRepository
    ) {}

    public function validateRuleDelete(int $id): void
    {
        if ($this->assuntoRepository->isLinkedToBooks($id)) {
            throw new AssuntoException(
                'Não é possível remover um assunto vinculado a um ou mais livros.'
            );
        }
    }
}
