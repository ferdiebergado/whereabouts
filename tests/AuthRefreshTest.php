<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthRefreshTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRefresh()
    {
        $uri = "/auth/refresh";

        $user = factory('App\User')->create();

        $token = Auth::login($user);

        $header = ['Authorization' => 'Bearer ' . $token];

        $this->post($uri, [], $header)->seeJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);

        $this->seeJson([
            'token_type' => 'bearer'
        ]);

        $this->seeStatusCode(200);
    }
}
