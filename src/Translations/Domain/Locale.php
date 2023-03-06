<?php

namespace Src\Translations\Domain;

use Src\Translations\Domain\ValueObjects\Language;

class Locale
{
    private const DEFAULT_LANG = "en";
    private $fullKey;
    private $key;
    private $group;
    private $languages;

    private function __construct(
        string $fullKey
    )
    {
        $this->validate($fullKey);
        $this->setFullKey($fullKey);
    }

    public static function build(string $fullKey): self
    {
        return new self($fullKey);
    }


    private function validate(string $fullKey): void
    {
        $parts = explode(".", $fullKey);
        if ( count($parts) < 2 ) {
            throw new \Exception("Invalid Locale");
        }
    }

    public function getFullKey(): string
    {
        return $this->fullKey;
    }

    public function setFullKey(string $fullKey): void
    {
        list($group, $key) = explode(".", $fullKey);
        $this->fullKey = $fullKey;
        $this->setKey($key);
        $this->setGroup($group);
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): void
    {
        $this->group = $group;
    }

    public function addLang(LocaleLang $lang): void
    {
        $this->languages[$lang->getLang()->getLanguage()] = $lang;
    }

    public function getLangs(): ?array
    {
        return $this->languages;
    }


    public function getLang( string $language ):? LocaleLang
    {
        $filtered = array_filter($this->getLangs(), function($element) use ($language) {
            return $element->getLang()->getLanguage() == $language;
        });
        return $filtered ? current($filtered) : $this->getLang(self::DEFAULT_LANG);
    }


    public function getTranslationStringLanguage(Language $language): string
    {
        return isset($this->languages[$language->getLanguage()]) ?
            $this->languages[$language->getLanguage()]->getString() :
            $this->languages[self::DEFAULT_LANG]->getString();
    }


    public function hasQuery( string $query): bool
    {
        if ( strpos($this->getFullKey(), strtolower($query)) !== false ) {
            return true;
        }

        if ( count($this->languages) > 0) {
            $filtered = array_filter($this->getLangs(), function($element) use ($query) {
                return strpos($element->getString(), $query);
            });
            return count($filtered) > 0;
        }
        return false;
    }


    /**
     * Transform object to array
     * @return array
     */
    public function toArray(): array
    {
        // Langs
        $langs = [];
        foreach ( Language::acceptedLanguages() as $lang ) {
            $localeLang = $this->getLang($lang);
            if ( $localeLang) {
                $langs[] = $localeLang->toArray();
            }
        }

        return [
            'full_key' => $this->fullKey,
            'key'   => $this->key,
            'group' => $this->group,
            'langs' => $langs

        ];
    }
}
