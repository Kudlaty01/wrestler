<?php

namespace Qdt01\Wrestler\ApiCalls;

use Qdt01\Wrestler\Middleware\Request;
use Qdt01\Wrestler\Middleware\RequestMethodInterface;
use Qdt01\Wrestler\Models\ModelInterface;

/**
 * Class GetAllProducersApiCall
 *
 * @package \Qdt01\Wrestler\ApiCalls
 */
class GetAllProducersApiCall extends AbstractProducerApiCall
{

	/**
	 * @return mixed
	 */
	function getRequest(): Request
	{
		$request = new Request(RequestMethodInterface::METHOD_GET, 'producers');
		return $request;
	}

	/**
	 * @return ModelInterface|ModelInterface[]
	 */
	function getResult()
	{
		return $this->getResponseAdapter()->getModelArray($this->response);
	}
}