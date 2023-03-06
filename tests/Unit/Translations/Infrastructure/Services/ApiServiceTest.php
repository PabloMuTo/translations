<?php

namespace Infrastructure\Services;

use PHPUnit\Framework\TestCase;
use Src\Domain\Url;
use Src\Infrastructure\Service\ShortenerApiService;
use Src\Translations\Infrastructure\Services\ApiService;

class ApiServiceTest  extends TestCase
{
    private $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->createMock(ApiService::class);
    }


    public function test_get_api_service()
    {
        $url      = "translations";
        $response = [
            "full_key" => "navbar.cars",
            "text" => [
                "en" => "Cars",
                "es" => "Flota"
            ]
        ];
        $this->repository->method('get')->with($url)->willReturn($response);
        $this->assertEquals($this->repository->get($url), $response);
    }


    public function test_get_api_unauthorized_service()
    {
        $url      = "translations";
        $this->repository->method('get')->with($url)->willReturn(null);
        $this->assertNull($this->repository->get($url));
    }

}
