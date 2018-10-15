<?php

namespace Qdt01\Wrestler\Middleware;

/**
 * Class AbstractMessage
 *
 * @package \Qdt01\Wrestler\Middleware
 */
abstract class AbstractMessage
{
	/**
	 * @var string[]
	 */
	protected $headers;
	/**
	 * @var string
	 */
	protected $body;

	/**
	 * AbstractMessage constructor.
	 * @param string $body
	 */
	public function __construct(?string $body = null)
	{
		$this->body    = $body;
		$this->headers = [];
	}


	/**
	 * @return string[]
	 */
	public function getHeaders(): array
	{
		return $this->headers;
	}

	/**
	 * @param string[] $headers
	 * @return AbstractMessage
	 */
	public function setHeaders(array $headers): AbstractMessage
	{
		$this->headers = $headers;
		return $this;
	}

	/**
	 * @param string $headerName
	 * @param string $headerValue
	 * @return AbstractMessage
	 */
	public function setHeader(string $headerName, string $headerValue): AbstractMessage
	{
		$this->headers[$headerName] = $headerValue;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getBody(): ?string
	{
		return $this->body;
	}

	/**
	 * @param string $body
	 * @return AbstractMessage
	 */
	public function setBody(string $body): AbstractMessage
	{
		$this->body = $body;
		return $this;
	}


}