<?php

namespace Src\Translations\Application;

use Src\Translations\Domain\Contracts\LocaleRepositoryInterface;

class ListTranslationsGroupHandle
{
    private $localeRepository;

    public function __construct(
        LocaleRepositoryInterface $localeRepository
    )
    {
        $this->localeRepository = $localeRepository;
    }

    /**
     * @param string $group
     * @return array
     */
    public function execute( string $group ): array
    {
        $groups = $this->localeRepository->listByGroup($group);
        return array_map(function($element) {
            return $element->toArray();
        }, $groups);
    }
}
