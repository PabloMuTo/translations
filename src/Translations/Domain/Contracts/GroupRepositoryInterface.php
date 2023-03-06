<?php

namespace Src\Translations\Domain\Contracts;

interface GroupRepositoryInterface
{
    /**
     * Obtener listado de todos los grupos
     * @return array
     */
    public function all(): array;
}
