<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class WhereaboutStoreTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore()
    {
        $uri = "/v1/whereabouts";
        $data = [
            'activity' => 'test test activity',
            'venue' => 'test test venue',
            'sponsor' => 'php',
            'start_date' => '2019-10-21',
            'end_date' => '2019-10-23',
            'user_id' => 3
        ];

        $this->post($uri, $data)->seeJsonStructure([
            'data' => [
                'id',
                'activity',
                'venue',
                'start_date',
                'end_date',
                'sponsor',
                'created_at',
                'updated_at'
            ]
        ]);

        $this->seeJson([
            'activity' => 'test test activity',
            'venue' => 'test test venue',
            'sponsor' => 'php',
            'user_id' => 3
        ]);

        $this->seeStatusCode(201);
    }
}
