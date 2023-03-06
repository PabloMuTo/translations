<?php

namespace Src\Translations\Domain;


use Src\Translations\Domain\ValueObjects\Language;

class LocaleLang
{
    private $lang;
    private $string;

    private function __construct(
        Language $lang, string $string
    )
    {
        $this->setLang($lang);
        $this->setString($string);
    }

    public static function build(Language $lang, string $string): self
    {
        return new self($lang, $string);
    }

    public function getLang(): Language
    {
        return $this->lang;
    }

    public function setLang(Language $lang): void
    {
        $this->lang = $lang;
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function setString(string $string): void
    {
        $this->string = $string;
    }


    public function toArray(): array
    {
        return [
            'lang' => $this->lang->getLanguage(),
            'string' => $this->string
        ];
    }
}
