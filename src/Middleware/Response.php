<?php

namespace Qdt01\Wrestler\Middleware;

/**
 * Class Response
 *
 * @package \Qdt01\Wrestler\Middleware
 */
class Response extends AbstractMessage
{
	private $reasons = [
		//  Client is responsible for error
		400 => 'Bad Request. Client sent invalid data to perform the request. Fix your request and send it again.',
		401 => 'Unauthorized. Client sent unauthorized request. Make sure that you perform Basic HTTP Authorization and that login and/or password is correct. Check also that user account is active',
		403 => 'Forbidden. You were authenticated. Server knows who you are. But you dont have access to specified resource.',
		404 => 'Not found. Specified resource was not found',

		//  Server is responsible for error
		500 => 'Internal server errors. Contact with i-sklep.pl or check server logs.',
		503 => 'Service unavailable. Contact with i-sklep.pl or check server logs.',
	];

	/**
	 * @var int
	 */
	private $statusCode;

	/**
	 * Response constructor.
	 * @param int         $statusCode
	 * @param null|string $body
	 */
	public function __construct(int $statusCode, ?string $body = null)
	{
		parent::__construct($body);
		$this->statusCode = $statusCode;
	}


	/**
	 * @return int
	 */
	public function getStatusCode(): int
	{
		return $this->statusCode;
	}

	/**
	 * @param int $statusCode
	 * @return Response
	 */
	public function setStatusCode(int $statusCode): Response
	{
		$this->statusCode = $statusCode;
		return $this;
	}


}