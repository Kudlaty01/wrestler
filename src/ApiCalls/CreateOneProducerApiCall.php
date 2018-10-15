<?php

namespace Qdt01\Wrestler\ApiCalls;

use Qdt01\Wrestler\Middleware\Request;
use Qdt01\Wrestler\Middleware\RequestMethodInterface;
use Qdt01\Wrestler\Models\ModelInterface;
use Qdt01\Wrestler\Models\Producer;

/**
 * Class CreateOneProducerApiCall
 *
 * @package \Qdt01\Wrestler\ApiCalls
 */
class CreateOneProducerApiCall extends AbstractProducerApiCall
{
	/**
	 * @var Producer
	 */
	private $model;

	/**
	 * CreateOneProducerApiCall constructor.
	 * @param Producer $producer
	 */
	public function __construct(Producer $producer)
	{
		$this->model = $producer;
	}


	/**
	 * @return Request
	 */
	public function getRequest(): Request
	{
		$request = new Request(RequestMethodInterface::METHOD_POST, 'producers');
		$body    = [
			'producer' => [
				'id'            => null,
				'name'          => $this->model->getName(),
				'site_url'      => $this->model->getSiteUrl(),
				'logo_filename' => $this->model->getLogoFilename(),
				'ordering'      => $this->model->getOrdering(),
				'source_id'     => $this->model->getSourceId(),
			],
		];
		return $request->setBody(json_encode($body));
	}

	/**
	 * @return ModelInterface|ModelInterface[]
	 */
	public function getResult()
	{
		return $this->getResponseAdapter()->getModel($this->response);
	}
}