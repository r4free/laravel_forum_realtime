<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/test');

        $response->assertStatus(404);
    }

    public function testReplies()
    {
        $this->seed('UsersTableSeeder');
        $response = $this->get('/thread/1');
        $response->assertStatus(200);
        $thread = Thread::find(1);
        $response->assertSee($thread->title);
        $response = $this->get('/thread/a');
        $response->assertStatus(404);

    }
}
