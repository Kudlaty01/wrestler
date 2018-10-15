<?php

namespace Qdt01\Wrestler\Middleware;

/**
 * Class Request
 *
 * @package \Qdt01\Wrestler\Middleware
 */
class Request extends AbstractMessage
{
	/**
	 * @var string
	 */
	private $url;
	/**
	 * @var string
	 */
	private $method;

	/**
	 * Request constructor.
	 * @param string      $method
	 * @param string      $url
	 * @param null|string $body
	 */
	public function __construct(string $method, string $url, ?string $body = null)
	{
		parent::__construct($body);
		$this->url    = $url;
		$this->method = $method;
	}


	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 * @return Request
	 */
	public function setUrl(string $url): Request
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return $this->method;
	}

	/**
	 * @param string $method
	 * @return Request
	 */
	public function setMethod(string $method): Request
	{
		$this->method = $method;
		return $this;
	}


}