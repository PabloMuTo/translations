<?php

namespace Src\Translations\Application;

use Src\Translations\Domain\ValueObjects\Language;

class ListAcceptedLanguagesHandle
{
    /**
     * Obtiene array listado de los idiomas aceptados
     * @return array
     */
    public function execute(): array
    {
        return Language::listAcceptedLanguages();
    }
}
