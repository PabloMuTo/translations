<?php

namespace Tests\Unit\Translations\Domain\ValueObjects;

use Src\Translations\Domain\LocaleLang;
use Src\Translations\Domain\ValueObjects\Language;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    public function test_instance_language_value_object()
    {
        $valueObject = new Language("es");
        $this->assertEquals("es", $valueObject->getLanguage());

        $valueObject->setLanguage("it");
        $this->assertEquals("it", $valueObject->getLanguage());
    }


    public function test_instance_language_incorrect_value_object()
    {
        $this->expectExceptionMessage("Invalid Language");
        $valueObject = new Language("ca");
    }
}
