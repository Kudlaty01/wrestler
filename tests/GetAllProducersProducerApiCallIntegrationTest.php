<?php
/**
 * User: developer
 * Date: 10/15/18
 * Time: 7:30 PM
 */

class GetAllProducersProducerApiCallIntegrationTest extends \Codeception\Test\Unit
{
	public function testGetAllProducersApiCall()
	{
		$config = new Qdt01\Wrestler\ApiConfiguration("http://grzegorz.demos.i-sklep.pl/rest_api/shop_api/v1/");
		$client = $config->getClient();
		$result = $client->send(new \Qdt01\Wrestler\ApiCalls\GetAllProducersApiCall());
		$this->assertNotEmpty($result, "Result should not be empty!");
		$this->assertInstanceOf(\Qdt01\Wrestler\Models\Producer::class, $result[0]);
	}

}
