<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthLoginTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $uri = "/auth/login";

        // $user = factory(App\User::class)->create();

        $data = [
            'email' => 'abc@123.com',
            'password' => 'abc@123'
        ];

        factory(App\User::class)->create($data);

        // $data = [
        //     'email' => $user->email,
        //     'password' => $user->password
        // ];

        $this->post($uri, $data)->seeJsonStructure([
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
