<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthRegisterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $uri = "/auth/register";

        $data = [
            'email' => '123@example.com',
            'password' => 'secretpass',
            'password_confirmation' => 'secretpass',
            'lastname' => 'userlastname',
            'firstname' => 'userfirstname',
            'sex' => 'M',
            'office' => 3,
            'position' => 5
        ];

        $this->post($uri, $data)
            ->seeJsonStructure([
                'message',
                'data'
            ])->seeJson([
                'message' => 'User registered.',
                'email' => '123@example.com'
            ])->seeStatusCode(201);
    }
}
