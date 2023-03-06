<?php

namespace Tests\Unit\Translations\Domain;

use Src\Translations\Domain\LocaleLang;
use Src\Translations\Domain\ValueObjects\Language;
use Tests\TestCase;

class LocaleLangTest extends TestCase
{
    public function test_instance_locale_lang_entity()
    {
        $entity = LocaleLang::build(new Language("es"),"Ejemplo");
        $this->assertEquals("Ejemplo", $entity->getString());
        $this->assertEquals(new Language("es"), $entity->getLang());
    }

}
