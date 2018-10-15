<?php

namespace Qdt01\Wrestler\Connector;


use Qdt01\Wrestler\Middleware\Request;
use Qdt01\Wrestler\Middleware\RequestMethodInterface;
use Qdt01\Wrestler\Middleware\Response;

/**
 * Class CurlConnector
 *
 * @package \Qdt01\Wrestler\Connector
 */
class CurlConnector
{
	/**
	 * @var resource
	 */
	protected $curl;
	/**
	 * @var bool verbose
	 */
	private $verbose = false;

	/**
	 * CurlConnector constructor.
	 */
	public function __construct()
	{
		$this->curl = curl_init();
	}


	function send(Request $request): Response
	{
		$this->setHeaders($request->getHeaders());
		$data = $request->getBody();

		curl_setopt_array($this->curl,
			[
				CURLOPT_VERBOSE        => intval($this->verbose),
				CURLOPT_HEADER         => 1,
				CURLOPT_URL            => $request->getUrl(),
				CURLOPT_RETURNTRANSFER => 1,
			]);

		switch ($request->getMethod()) {
			case RequestMethodInterface::METHOD_GET:
				curl_setopt($this->curl, CURLOPT_HTTPGET, 1);
				break;
			case RequestMethodInterface::METHOD_POST:
				if ($data) {
					curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
				}
				break;
			default:
				curl_setopt($this->curl, CURLOPT_PUT, 1);
				break;
		}


		$result = curl_exec($this->curl);

		$curlInfo = curl_getinfo($this->curl);
		$response = new Response($curlInfo['http_code']);
		/**
		 * TODO: set headers
		 */
		$resultBody = substr($result, $curlInfo['header_size']);

		$response->setBody($resultBody);
		return $response;

	}

	/**
	 * @param string[] $headers
	 * @return CurlConnector
	 */
	protected function setHeaders(array $headers): self
	{
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, array_map(function ($headerName, $headerValue) {
			return "$headerName: $headerValue";
		}, array_keys($headers), $headers));
		return $this;
	}

	/**
	 *
	 */
	public function __destruct()
	{
		curl_close($this->curl);
	}

	public function isVerbose(): bool
	{
		return $this->verbose;
	}

	public function setVerbose(bool $verbose): self
	{
		$this->verbose = $verbose;
		return $this;
	}


}