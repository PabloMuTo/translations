<?php

namespace Src\Translations\Domain;

class Group
{
    private $key;
    private $locales;

    private function __construct(
        string $key
    )
    {
        $this->validate($key);
        $this->setKey($key);
        $this->resetLocales();
    }

    public static function build(string $key): self
    {
        return new self($key);
    }


    private function validate(string $key): void
    {
        if ( strlen($key) == 0 ) {
            throw new \Exception("Invalid Translation Group");
        }
    }



    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getLocales(): array
    {
        return $this->locales;
    }

    public function setLocales( array $translations ): void
    {
        $this->locales = $translations;
    }

    public function addLocale( Locale $translation )
    {
        $this->locales->push($translation);
    }


    private function resetLocales(): void
    {
        $this->locales = [];
    }


    public function toArray(): array
    {
        return [
            'key' => $this->key
        ];
    }
}
