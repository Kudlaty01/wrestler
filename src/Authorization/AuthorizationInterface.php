<?php

namespace Qdt01\Wrestler\Authorization;


use Qdt01\Wrestler\Middleware\Request;

/**
 * Class AuthorizationInterface
 *
 * @package \Qdt01\Wrestler\Authentication
 */
interface AuthorizationInterface
{
	public function authorize(Request $request): Request;
}