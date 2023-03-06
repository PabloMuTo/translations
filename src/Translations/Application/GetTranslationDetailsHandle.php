<?php

namespace Src\Translations\Application;

use Src\Translations\Domain\Contracts\LocaleRepositoryInterface;

class ListAllTranslationsHandle
{
    private $localeRepository;

    public function __construct(
        LocaleRepositoryInterface $localeRepository
    )
    {
        $this->localeRepository = $localeRepository;
    }


    /**
     * Detalles de una traducción
     *
     * @param string $key
     */
    public function execute( string $key ):? array
    {
        $details = $this->localeRepository->getById($key);
        return $details ? $details->toArray() : null;
    }
}
