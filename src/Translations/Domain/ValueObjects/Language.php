<?php

namespace Src\Translations\Domain\ValueObjects;

class Language {

    const EN = "en";
    const ES = "es";
    const DE = "de";
    const FR = "fr";
    const IT = "it";
    const DA = "da";

    private $language;

    public function __construct( string $language )
    {
        $this->validate($language);
        $this->setLanguage($language);
    }


    private function validate(string $language): void
    {
        if ( !in_array($language, self::acceptedLanguages()) ) {
            throw new \Exception("Invalid Language");
        }
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): string
    {
       return $this->language;
    }


    public static function acceptedLanguages(): array
    {
        return [
            self::EN,
            self::ES,
            self::DE,
            self::FR,
            self::IT,
            self::DA
        ];
    }


    public static function listAcceptedLanguages(): array
    {
        return [
            self::EN => 'English',
            self::ES => 'Español',
            self::DE => 'Deutsch',
            self::FR => 'Français',
            self::IT => 'Italiano',
            self::DA => 'Dansk'
        ];
    }
}
