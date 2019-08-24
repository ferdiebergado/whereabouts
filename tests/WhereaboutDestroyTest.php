<?php

use App\Whereabout;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class WhereaboutDestroyTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test destroy a resource.
     *
     * @return void
     */
    public function testDestroy()
    {
        $whereabout = factory(App\Whereabout::class)->create();
        $id = $whereabout->id;
        $uri = "/v1/whereabouts/$id";
        $user = factory('App\User')->create();

        $this->actingAs($user)->delete($uri)->seeJson([
            'data' => "Resource $id deleted."
        ]);

        $this->seeStatusCode(200);
    }
}
