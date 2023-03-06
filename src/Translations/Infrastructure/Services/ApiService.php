<?php

namespace Src\Translations\Infrastructure\Services;

use Illuminate\Support\Facades\Http;

/**
 * Cliente HTTP. Utiliza la Facade HTTP propia de laravel.
 * Se podría sustituir por cualquier otro cliente http.
 */
class ApiService
{
    private $client;

    public function __construct()
    {
        $this->client = Http::acceptJson();
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->client->baseUrl($baseUrl);
    }

    public function setHeader(array $header)
    {
        $this->client->withHeaders($header);
    }

    public function setToken(string $token)
    {
        $this->client->withToken($token);
    }

    public function setBasicAuth(string $username, string $password)
    {
        $this->client->withBasicAuth($username, $password);
    }

    /**
     * @param string $url
     * @return object|null
     * @throws \Exception
     */
    public function get( string $url ): ?array
    {
        try {
            $response = $this->client->get($url);

            if ( $response->successful() ) {
                return json_decode($response->body())->data;
            }
            return null;
        }
        catch ( \Exception $e ) {
            throw new \Exception("Invalid api call");
        }
    }


    public function post(string $url, array $data): ?array
    {
        // TODO - Pendiente implementar
        return null;
    }

    public function put(string $url, array $data): ?array
    {
        // TODO - Pendiente implementar
        return null;
    }
}
