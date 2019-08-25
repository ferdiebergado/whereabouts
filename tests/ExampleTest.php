<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->seeJsonStructure([
            'message',
            'data'
        ]);

        $this->seeJson([
            "message" => "OK",
            "api_version" => "1.1.0",
            "framework_version" => "Lumen (5.8.12) (Laravel Components 5.8.*)"
        ]);

        // $this->assertEquals(
        //     $this->app->version(), $this->response->getContent()
        // );
    }
}
