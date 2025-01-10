<?php

namespace Zoker\Shop\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zoker\Shop\Enums\MinimaxEndPoints;
use Zoker\Shop\Models\SyncLog;

class Minimax
{
    private string $baseUrl = '';

    private array $credentials = [];

    protected Client $client;

    protected ?string $token = null;

    protected HandlerStack $stack;

    public function __construct()
    {
        $this->baseUrl = 'https://moj.minimax.' . config('services.minimax.localization') . '/' . config('services.minimax.localization');
        $this->credentials = [
            'client_id' => config('services.minimax.client_id'),
            'client_secret' => config('services.minimax.client_secret'),
            'grant_type' => 'password',
            'username' => config('services.minimax.login'),
            'password' => config('services.minimax.password'),
            'scope' => 'minimax.si',
        ];

        $this->stack = new HandlerStack;
        $this->stack->setHandler(new CurlHandler);
        $this->stack->push($this->handleAuthorizationHeader());

        $this->client = new Client([
            'handler' => $this->stack,
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);

        $this->token = $this->setToken();
    }

    private function request(string $method, string $endPoint, array $options = []): ResponseInterface
    {
        $start = microtime(true);
        $response = $this->client->request($method, $this->baseUrl . '/API' . $endPoint, $options);
        $end = microtime(true);

        try {
            SyncLog::create([
                'service' => 'minimax',
                'method' => $method,
                'uri' => $endPoint,
                'response' => $response->getBody(),
                'code' => $response->getStatusCode(),
                'query_time' => $end - $start,
            ]);

        } catch (RequestException $e) {
            Log::error($e->getMessage());
        }

        return $response;
    }

    public function getProducts($page = 0, $limit = 1000): object
    {
        $query = [
            'query' => [
                'PageSize' => $limit,
                'CurrentPage' => $page,
            ],
        ];

        $response = $this->request('GET', MinimaxEndPoints::PRODUCTS->withOrganisationId(), $query);

        return json_decode((string) $response->getBody());
    }

    public function getStock($page = 0, $limit = 1000): object
    {
        $query = [
            'query' => [
                'PageSize' => $limit,
                'CurrentPage' => $page,
            ],
        ];

        $response = $this->request('GET', MinimaxEndPoints::STOCK->withOrganisationId(), $query);

        return json_decode((string) $response->getBody());
    }

    public function getOrganisations(): object
    {
        $response = $this->request('GET', MinimaxEndPoints::ALL_ORGANISATIONS->value);

        return json_decode((string) $response->getBody());
    }

    /**
     * Handle Authorization Header
     */
    private function handleAuthorizationHeader(): callable
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                if ($this->token) {
                    $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
                }

                return $handler($request, $options);
            };
        };
    }

    public function setToken(): string
    {
        return cache()->remember('minimax_token', 60 * 60 - 1, function () {
            $response = $this->client->post($this->baseUrl . MinimaxEndPoints::AUTH->value, [
                'form_params' => $this->credentials,
            ]);

            return json_decode((string) $response->getBody())->access_token;
        });
    }
}
