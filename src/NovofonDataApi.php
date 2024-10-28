<?php

namespace Sazanof\NovofonApiV2;

use GuzzleHttp\Exception\GuzzleException;
use Sazanof\NovofonApiV2\Builder\Filter;
use Sazanof\NovofonApiV2\Builder\Sort;
use Sazanof\NovofonApiV2\Exceptions\ReflectionException;
use Sazanof\NovofonApiV2\Requests\Request;
use Sazanof\NovofonApiV2\Responses\AccountResponse;
use Sazanof\NovofonApiV2\Responses\CustomersResponse;
use Sazanof\NovofonApiV2\Responses\SipLineResponse;
use Sazanof\NovofonApiV2\Responses\SipLineVirtualNumbersResponse;

class NovofonDataApi
{
    protected string $url = 'https://dataapi-jsonrpc.novofon.ru/v2.0';
    protected string $token;
    protected string $appId;

    protected static ?NovofonDataApi $instance = null;

    public Request $request;

    public Filter $filter;

    public Sort $sort;

    protected array $params;

    protected ?int $limit;
    protected ?int $offset;

    public function __construct(string $appId, string $token)
    {
        $this->sort = new Sort();
        $this->setToken($token);
        $this->setAppId($appId);
        $this->filter = new Filter();

        $this->request = new Request($this->url, $this->token);
    }

    /**
     * @param string $url
     */
    protected function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param string $app
     */
    protected function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @param string $token
     */
    protected function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param int $limit
     * @return NovofonDataApi
     */
    public function setLimit(int $limit): static
    {
        $this->limit = $limit;
        $this->params['limit'] = $limit;
        return $this;
    }

    /**
     * @return $this
     */
    public function removeLimit(): static
    {
        $this->limit = null;
        unset($this->params['limit']);
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $offset
     */
    public function setOffset(int $offset): static
    {
        $this->params['offset'] = $offset;
        $this->offset = $offset;
        return $this;
    }

    public function removeOffset(): static
    {
        $this->limit = null;
        unset($this->params['offset']);
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }


    public static function initialize(string $appId, string $token): NovofonDataApi
    {
        if (self::$instance === null) {
            self::$instance = new NovofonDataApi($appId, $token);
        }
        return self::$instance;
    }

    /**
     * @return \ReflectionClass|AccountResponse|null
     */
    public function getAccount(): \ReflectionClass|AccountResponse|null
    {
        return $this->request->make('get.account')->to(AccountResponse::class);
    }

    /**
     * @return \ReflectionClass|CustomersResponse|null
     */
    public function getCustomers(): \ReflectionClass|CustomersResponse|null
    {
        $filter = (array)$this->filter;
        return $this->request->make('get.customers', $filter)->to(CustomersResponse::class);
    }

    /**
     * @return \ReflectionClass|CustomersResponse|null
     * @throws GuzzleException|Exceptions\BaseError
     */
    public function getSipLines(): \ReflectionClass|SipLineResponse|null
    {
        $this->prepare();
        return $this->request->make('get.sip_lines', $this->params)->to(SipLineResponse::class);
    }

    /**
     * @param array $params
     * @return SipLineVirtualNumbersResponse
     * @throws GuzzleException|Exceptions\BaseError
     */
    public function getSipLineVirtualNumbers(array $params = []): SipLineVirtualNumbersResponse
    {
        $this->params = $params;
        $this->addFilter();
        //dd($this->params);
        return $this->request->make('get.sip_line_virtual_numbers', $this->params)->to(SipLineVirtualNumbersResponse::class);
    }

    private function prepare(): static
    {
        $this->addFilter();
        return $this;
    }

    private function addFilter(): static
    {
        if (!empty($this->filter->filter)) {
            $filter = json_decode(json_encode($this->filter), true);
            $this->params = array_merge($this->params, $filter);
        }
        return $this;
    }

    /**
     * @throws ReflectionException
     */
    public function orderBy(string $field, string $order): static
    {
        $this->sort->add($field, $order);
        $this->params['sort'] = $this->sort->toArray();
        return $this;
    }


}