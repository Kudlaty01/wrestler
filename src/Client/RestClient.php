<?php

namespace Qdt01\Wrestler\Client;

use Qdt01\Wrestler\ApiCalls\AbstractApiCall;
use Qdt01\Wrestler\Authorization\AuthorizationInterface;
use Qdt01\Wrestler\Connector\CurlConnector;
use Qdt01\Wrestler\Models\ModelInterface;

/**
 * Class RestClient
 *
 * @package \Qdt01\Wrestler\Client
 */
class RestClient
{
	/**
	 * @var CurlConnector
	 */
	private $connector;
	/**
	 * @var AuthorizationInterface
	 */
	private $authorization;
	/**
	 * @var string
	 */
	private $baseEndpoint;

	/**
	 * RestClient constructor.
	 * @param string                 $baseEndpoint
	 * @param CurlConnector          $connector
	 * @param AuthorizationInterface $authorization
	 */
	public function __construct(string $baseEndpoint, CurlConnector $connector, AuthorizationInterface $authorization)
	{

		$this->connector     = $connector;
		$this->authorization = $authorization;
		$this->baseEndpoint  = $baseEndpoint;
	}


	/**
	 * @param AbstractApiCall $apiCall
	 * @return ModelInterface|ModelInterface[]
	 */
	public function send(AbstractApiCall $apiCall)
	{
		$request = $apiCall->getRequest();
		$request->setUrl($this->baseEndpoint . $request->getUrl());
		$request  = $this->authorization->authorize($request);
		$response = $this->connector->send($request);
		$apiCall->setResponse($response);
		return $apiCall->getResult();

	}

}