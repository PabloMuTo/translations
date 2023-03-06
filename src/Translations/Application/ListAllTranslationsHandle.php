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


    public function execute()
    {

    }
}
