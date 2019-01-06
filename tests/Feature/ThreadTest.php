<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetThreads()
    {
        $this->seed('UsersTableSeeder');
        $response = $this->get('/thread');
        $response->assertStatus(200);
    }

    public function testGetThread()
    {
        $this->seed('UsersTableSeeder');
        $response = $this->get('/thread/1');
        $response->assertStatus(200);
        $thread = Thread::find(1);
        $response->assertSee($thread->title);

    }

    public function testFailGetTread()
    {
        $this->seed('UsersTableSeeder');
        $response = $this->get('/thread/a');
        $response->assertStatus(404);
    }
}
