<?php

namespace Src\Translations\Domain\Contracts;

use Src\Translations\Domain\Locale;

interface LocaleRepositoryInterface
{
    /**
     * Obtener todos los locales
     * @return array
     */
    public function all(): array;


    /**
     * Obtener listado de locales de un grupo
     * @param string $group
     * @return array
     */
    public function listByGroup( string $group ): array;

    /**
     * Obtener detalles de un locale
     * @return Locale|null
     */
    public function getById( string $locale ): ?Locale;
    
}
