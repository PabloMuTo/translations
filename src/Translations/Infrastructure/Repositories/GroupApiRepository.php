<?php

namespace Src\Translations\Infrastructure\Repositories;

use Src\Translations\Domain\Contracts\GroupRepositoryInterface;
use Src\Translations\Domain\Group;

final class GroupApiRepository extends AbstractApiRepository implements GroupRepositoryInterface
{
    public function all(): array
    {
        $responseApi = $this->apiService->get("translationgroups");
        return array_map(function($element) {
            return $this->buildGroupObject($element);
        }, $responseApi);
    }


    private function buildGroupObject( string $element ): Group
    {
        return Group::build($element);
    }
}
