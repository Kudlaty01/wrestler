<?php

namespace Qdt01\Wrestler\Authorization;

use Qdt01\Wrestler\Middleware\Request;

class BasicAuthorization implements AuthorizationInterface
{
	/** @var string */
	private $userName;
	/** @var string */
	private $password;
	/** @var string */
	private $headerToken;

	public function __construct(string $userName, string $password)
	{
		$this->userName = $userName;
		$this->password = $password;
		return $this;
	}

	public function authorize(Request $request): Request
	{
		if (empty($this->headerToken)) {
			$this->headerToken = base64_encode(join(':', [$this->userName, $this->password]));
		}
		$headerValue = 'Basic ' . $this->headerToken;
		return $request->setHeader('Authorization', $headerValue);
	}
}