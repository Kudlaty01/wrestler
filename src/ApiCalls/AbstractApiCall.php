<?php

namespace Qdt01\Wrestler\ApiCalls;

use Qdt01\Wrestler\Adapters\AbstractResponseToModelAdapter;
use Qdt01\Wrestler\Middleware\Request;
use Qdt01\Wrestler\Middleware\Response;
use Qdt01\Wrestler\Models\ModelInterface;

abstract class AbstractApiCall
{
	/**
	 * @var Response
	 */
	protected $response;

	/**
	 * @return Request
	 */
	abstract public function getRequest(): Request;

	/**
	 * @return ModelInterface|ModelInterface[]
	 */
	abstract public function getResult();

	abstract public function getResponseAdapter(): AbstractResponseToModelAdapter;

	public function setResponse(Response $response): self
	{
		$this->response = $response;
		return $this;
	}

}