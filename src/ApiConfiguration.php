<?php

namespace Qdt01\Wrestler;

use Qdt01\Wrestler\Authorization\AuthorizationInterface;
use Qdt01\Wrestler\Authorization\BasicAuthorization;
use Qdt01\Wrestler\Client\RestClient;
use Qdt01\Wrestler\Connector\CurlConnector;

/**
 * Class ApiConfiguration
 *
 * @package \Qdt01\Wrestler
 */
class ApiConfiguration
{
	/**
	 * @var AuthorizationInterface
	 */
	protected $authorization;
	/**
	 * @var string
	 */
	private $baseEndpoint;

	/**
	 * ApiConfiguration constructor.
	 * @param string $baseEndpoint
	 */
	public function __construct(string $baseEndpoint)
	{
		$this->baseEndpoint = $baseEndpoint;
		$this->setAuthorization();
	}

	/**
	 * I agree it could be better and put the credentials bootstrap inside authorization class
	 * @return ApiConfiguration
	 */
	protected function setAuthorization(): self
	{
		$credentials = file_get_contents('credentials.json');
		['user' => $userName, 'pass' => $password] = json_decode($credentials, true);
		$this->authorization = new  BasicAuthorization($userName, $password);
		return $this;
	}

	public function getClient(): RestClient
	{
		return new RestClient($this->baseEndpoint, new CurlConnector(), $this->authorization);
	}
}