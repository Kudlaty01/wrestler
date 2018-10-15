<?php

namespace Qdt01\Wrestler\ApiCalls;

use Qdt01\Wrestler\Adapters\AbstractResponseToModelAdapter;
use Qdt01\Wrestler\Adapters\ResponseToProducerAdapter;

/**
 * Class AbstractProducerApiCall
 *
 * @package \Qdt01\Wrestler\ApiCalls
 */
abstract class AbstractProducerApiCall extends AbstractApiCall
{
	public function getResponseAdapter(): AbstractResponseToModelAdapter
	{
		return new ResponseToProducerAdapter();
	}

}