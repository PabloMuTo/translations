<?php

namespace Src\Translations\Infrastructure\Repositories;

use Src\Translations\Infrastructure\Services\ApiService;

class AbstractApiRepository
{
    protected $apiService;

    public function __construct(
        ApiService $apiService
    )
    {
        $this->apiService = $apiService;
        $this->apiService->setBaseUrl("https://practical-neumann.62-151-178-253.plesk.page/api/");
        // TODO
        //$this->apiService->setBasicAuth(env('AUTH_API_BASIC_USERNAME'), env('AUTH_API_BASIC_PASSWORD'));
        $this->apiService->setHeader([
            'Authorization' => 'Basic Y2FuZGlkYXRlOnNjYW5kaW5hdmlhbnRyYXZlbDIwMjM=, Bearer 1|DLZw2t9fpdbmFhjjqLZB0EfM882eV7fizMIkX6KQ'
        ]);
    }
}
