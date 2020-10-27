<?php

use PHPUnit\Framework\TestCase;

class JsonParserTest extends TestCase
{
    private $http;

    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'https://api.exchangeratesapi.io/']);
    }

    public function tearDown()
    {
        $this->http = null;
    }

    public function testGetLatestEndPoint()
    {
        $response = $this->http->request('GET', 'latest');
        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
        
        $json = json_decode($response->getBody(), true);
        $this->assertArrayHasKey("rates", $json);
    }
}
?>