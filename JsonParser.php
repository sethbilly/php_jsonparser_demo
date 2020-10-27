<?php
require './vendor/autoload.php';
require './ApiResponse.php';

class JsonParser {

    public function exchangeRate() {
        // Create Client with base uri for exchangerateapi
        try{
            $client = new GuzzleHttp\Client(['base_uri' => 'https://api.exchangeratesapi.io/']);
            // Latest endpoint 
            $response = $client->request('GET', 'latest');
            $statusCode = $response->getStatusCode();
            if($statusCode == 200) {
                // Get body of the response and stringify
                $body = (string)$response->getBody();
                // Parse json to ApiResponse Object
                $apiResponse = new ApiResponse($body);
                // Print associative response to console
                print_r($apiResponse);
            }
        }catch(Exception $e){
            echo $e;
        }

    }

}

$parser = new JsonParser();
echo $parser->exchangeRate();
?>