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
        factory(App\Whereabout::class, 1)->create();
        $todelete = Whereabout::latest()->first();
        $id = $todelete->id;
        $uri = "/v1/whereabouts/$id";

        $this->delete($uri)->seeJson([
            'data' => "Resource $id deleted."
        ]);

        $this->seeStatusCode(200);
    }
}
