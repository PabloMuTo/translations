<?php

namespace Src\Translations\Application\Services;

use Src\Translations\Domain\Contracts\LocaleRepositoryInterface;

/**
 * Servicio de búsqueda de locales, por query string y por grupo
 */
class SearchLocalesService
{

    private $localeRepository;

    public function __construct(
        LocaleRepositoryInterface $localeRepository
    )
    {
        $this->localeRepository = $localeRepository;
    }

    public function execute( ?string $group = "", ?string $query = "" ): array
    {
        $locales = $this->localeRepository->all();
        if ( !$query && !$group ) {
            return $locales;
        }

        if ( $group != "" ) {
            $locales = $this->filterByGroup($locales, $group);
        }

        if ( $query != "" ) {
            $locales = $this->filterByQueryString($locales, $query);
        }
        return $locales;
    }


    private function filterByGroup( array $list, string $group ): array
    {
        return array_filter($list, function($element) use ($group) {
            return $element->getGroup() == $group;
        });
    }


    private function filterByQueryString ( array $list, string $query ): array
    {
        return array_filter($list, function($element) use ($query) {
            return $element->hasQuery($query);
        });
    }
}
