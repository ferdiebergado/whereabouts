<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthLogoutTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogout()
    {
        $uri = "/auth/logout";

        $user = factory('App\User')->create();

        $token = Auth::login($user);

        $header = ['Authorization' => 'Bearer ' . $token];

        $this->post($uri, [], $header)->seeJson([
            'message' => 'Successfully logged out'
        ])->seeStatusCode(200);
    }
}
