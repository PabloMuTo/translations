<?php

namespace Tests\Unit\Translations\Domain;

use Src\Translations\Domain\Locale;
use Src\Translations\Domain\LocaleLang;
use Src\Translations\Domain\ValueObjects\Language;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    public function test_instance_locale_entity()
    {
        $entity = Locale::build("cars.example");
        $this->assertEquals("example", $entity->getKey());
        $this->assertEquals("cars", $entity->getGroup());
        $this->assertEquals("cars.example", $entity->getFullKey());
        $this->assertEmpty($entity->getLangs());
    }

    public function test_instance_locale_entity_with_langs()
    {
        $entity = Locale::build("cars.example");

        $entity->addLang(LocaleLang::build(new Language("es"),"Ejemplo"));
        $entity->addLang(LocaleLang::build(new Language("en"),"Example"));

        $this->assertCount(2, $entity->getLangs());
        $this->assertEquals("Ejemplo", $entity->getTranslationStringLanguage(new Language("es")));
        $this->assertEquals("Example", $entity->getTranslationStringLanguage(new Language("en")));
        $this->assertEquals("Example", $entity->getTranslationStringLanguage(new Language("it")));
    }


    public function test_instance_invalid_locale()
    {
        $this->expectExceptionMessage("Invalid Locale");
        Locale::build("");

        $this->expectExceptionMessage("Invalid Locale");
        Locale::build("car");
    }
}
