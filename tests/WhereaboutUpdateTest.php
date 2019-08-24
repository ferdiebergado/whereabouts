<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class WhereaboutUpdateTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdate()
    {
        $uri = "/v1/whereabouts/2?";
        $data = [
            'activity' => 'making of jill',
            'venue' => 'web',
            'sponsor' => 'somafm',
            'start_date' => '2019-2-18',
            'end_date' => '2019-3-3',
            'user_id' => 7
        ];

        $param = $uri . http_build_query($data);

        $user = factory('App\User')->create();

        $this->actingAs($user)->put($param)->seeJsonStructure([
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
            'id' => 2,
            'activity' => 'making of jill',
            'venue' => 'web',
            'sponsor' => 'somafm',
        ]);

        $this->seeStatusCode(200);
    }
}
