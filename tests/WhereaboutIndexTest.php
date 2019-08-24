<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class WhereaboutIndexTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $uri = "/v1/whereabouts?length=10";
        $this->get($uri)->seeJsonStructure([
            'data' => [
                [
                    'id',
                    'activity',
                    'venue',
                    'start_date',
                    'end_date',
                    'sponsor',
                    'created_at',
                    'updated_at'
                ]
            ],
            'links' => [
                'first',
                'last',
                'prev',
                'next'
            ],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'path',
                'per_page',
                'to',
                'total'
            ]
        ]);
        $this->seeJson([
            'id' => 1
        ]);
        $this->seeStatusCode(200);
    }
}
