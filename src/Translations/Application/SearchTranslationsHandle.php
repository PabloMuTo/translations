<?php

namespace Src\Translations\Application;

use Src\Translations\Application\Services\SearchLocalesService;
use Src\Translations\Domain\Contracts\LocaleRepositoryInterface;

class SearchTranslationsHandle
{
    private $searchLocalesService;

    public function __construct(
        SearchLocalesService $searchLocalesService
    )
    {
        $this->searchLocalesService = $searchLocalesService;
    }



    public function execute( ?string $group = "", ?string $query = "" ):? array
    {
        $locales = $this->searchLocalesService->execute($group, $query);
        return array_map(function($element) {
            return $element->toArray();
        }, $locales);
    }
}
