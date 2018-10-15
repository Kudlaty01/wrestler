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
class ResponseToProducerAdapter extends AbstractResponseToModelAdapter
{
	/**
	 * @param Response $response
	 * @return Producer
	 */
	public function getModel(Response $response): ModelInterface
	{
		$jsonData = $response->getBody();

		$result = $this->extractData($jsonData);
		return $this->extractModel($result['producer']);

	}

	/**
	 * @param array $result
	 * @return Producer
	 */
	protected function extractModel(array $result): ModelInterface
	{
		$producer = new Producer();
		$producer->setId($result['id'])
			->setName($result['name'])
			->setSourceId($result['source_id'])
			->setLogoFilename($result['logo_filename'])
			->setSiteUrl($result['site_url'])
			->setOrdering($result['ordering']);
		return $producer;
	}

}