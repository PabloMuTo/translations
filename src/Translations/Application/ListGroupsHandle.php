<?php

namespace Src\Translations\Application;

use Src\Translations\Domain\Contracts\GroupRepositoryInterface;
use Src\Translations\Domain\Contracts\LocaleRepositoryInterface;

class ListGroupsHandle
{
    private $groupRepository;

    public function __construct(
        GroupRepositoryInterface $groupRepository
    )
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Obtiene listado de todos los grupos de traducción
     * @return array
     */
    public function execute(): array
    {
        $groups = $this->groupRepository->all();
        return array_map(function($element) {
            return $element->toArray();
        }, $groups);
    }
}
