<?php

namespace Qdt01\Wrestler\Adapters;


use Qdt01\Wrestler\Middleware\Response;
use Qdt01\Wrestler\Models\ModelInterface;
use Qdt01\Wrestler\Models\Producer;

/**
 * Class ResponseToProducerAdapter
 *
 * @package \Qdt01\Wrestler\Adapters
 */
abstract class AbstractResponseToModelAdapter
{
	abstract public function getModel(Response $response): ModelInterface;

	/**
	 * @param Response $response
	 * @return Producer[]
	 */
	public function getModelArray(Response $response): array
	{
		$jsonData    = $response->getBody();
		$result      = array_values($this->extractData($jsonData));
		$arrayResult = array_map([$this, 'extractModel'], $result[0]);
		return $arrayResult;
	}

	abstract protected function extractModel(array $result): ModelInterface;

	protected function extractData(string $result): array
	{
		$decodedResult = json_decode($result, true);
		return $decodedResult['data'];
	}

}