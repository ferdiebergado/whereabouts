<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class WhereaboutShowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShow()
    {
        $uri = "/v1/whereabouts/2";
        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->get($uri)->seeJsonStructure([
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

        $this->get($uri)->seeJson([
            'id' => 2
        ]);
        $this->seeStatusCode(200);
    }
}
