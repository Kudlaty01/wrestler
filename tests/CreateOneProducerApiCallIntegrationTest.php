<?php
/**
 * User: developer
 * Date: 10/15/18
 * Time: 8:56 PM
 */

use Qdt01\Wrestler\ApiCalls\CreateOneProducerApiCall;

class CreateOneProducerApiCallIntegrationTest extends \Codeception\Test\Unit
{
	public function testCreateOneProducerApiCall()
	{

		$config = new Qdt01\Wrestler\ApiConfiguration("http://grzegorz.demos.i-sklep.pl/rest_api/shop_api/v1/");
		$client = $config->getClient();

		$producer = new \Qdt01\Wrestler\Models\Producer();
		$producer->setName("Fredi Makury")
			->setLogoFilename('noLogo.png')
			->setSiteUrl('http://i-systems.pl')
			->setId(null)
			->setSourceId(null);
		$result = $client->send(new CreateOneProducerApiCall($producer));
		$this->assertNotEmpty($result);
		$this->assertNotEmpty($result->getId());
		$this->assertEquals($producer->getName(), $result->getName());
		$this->assertEquals($producer->getLogoFilename(), $result->getLogoFilename());
		$this->assertEquals($producer->getSiteUrl(), $result->getSiteUrl());

	}

}
