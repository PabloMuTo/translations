<?php

namespace Src\Translations\Infrastructure\Repositories;

use Src\Translations\Domain\Contracts\LocaleRepositoryInterface;
use Src\Translations\Domain\Locale;
use Src\Translations\Domain\LocaleLang;
use Src\Translations\Domain\ValueObjects\Language;

final class LocaleApiRepository extends AbstractApiRepository implements LocaleRepositoryInterface
{
    public function all(): array
    {
        $responseApi = $this->apiService->get("translations");
        return array_map(function($element) {
            return $this->buildLocaleObject($element);
        }, $responseApi);
    }

    public function listByGroup(string $group): array
    {
        $responseApi = $this->apiService->get("translations");

        $elementsGroup = array_filter($responseApi, function($element) use ($group) {
            $locale = Locale::build($element->full_key);
            return $locale->getGroup() == $group;
        });

        return array_map(function($element) {
            return $this->buildLocaleObject($element);
        }, $elementsGroup);
    }

    public function getById( string $locale ): ?Locale
    {
        $responseApi = $this->apiService->get("translations/$locale");
        return $responseApi ? $this->buildLocaleObject($responseApi) : null;
    }


    /**
     * Transforma objeto json de la api en objeto/entidad Locale (DTO)
     * @param object $element
     * @return Locale
     */
    private function buildLocaleObject( object $element ): Locale
    {
        $locale = Locale::build($element->full_key);
        $text = $element->text;

        foreach ( $text as $lang => $string ) {
            $locale->addLang(
                LocaleLang::build(new Language($lang), $string)
            );
        }
        return $locale;
    }



}
