<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */

/**
 * Author: oluoch
 * URL: www.blaqueyard.com
 * twitter: http://twitter.com/menty44
 * fred.oluoch@blaqueyard.com
 */

final class ApisTest extends TestCase
{   

    
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://0.0.0.0:8000'
            ]);
    }

    //test function for Accounts
    public function testGet_ValidInput_AccountObject()
    {
        $response = $this->client->get('/api/accounts');

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getBody()->getContents();          
        
    }

    //test function for Accounts by id
    public function testGet_ValidInput_AccountbyidObject()
    {
        $response = $this->client->get('/api/accounts/1');

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getBody()->getContents();          
        
    }

    //test function for balance
    public function testGet_ValidInput_BalanceObject()
    {
        $response = $this->client->get('/api/balance');

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getBody()->getContents();          
        
    }

    //test function for balance by id
    public function testGet_ValidInput_BalancebyidObject()
    {
        $response = $this->client->get('/api/balancebyid/1');

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getBody()->getContents();          
        
    }

    //test function for deposit by id
    public function testGet_ValidInput_DepositObject()
    {
        $response = $this->client->put('/api/deposit/2');

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getBody()->getContents();          
        
    }

    //test function for withdrawal by id
    public function testGet_ValidInput_WithDrawalObject()
    {
        $response = $this->client->put('/api/withdrawal/1');

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getBody()->getContents();          
        
    }

    


    
}
