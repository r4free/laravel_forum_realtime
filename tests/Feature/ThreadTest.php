<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
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

        $response = $this->authenticate()->get('/thread');

        $response->assertStatus(200);

    }

    public function testGetThread()
    {
        $this->seed('UsersTableSeeder');
        $response = $this->authenticate()->get('/thread/1');
        $response->assertStatus(200);
        $thread = Thread::find(1);
        $response->assertSee($thread->title);

    }

    public function testFailGetTread()
    {
        $this->seed('UsersTableSeeder');
        $response = $this->authenticate()->get('/thread/a');
        $response->assertStatus(404);
    }

    /**
     * needs to see ther user that thread belongs
     */
    public function testGetUserOwner()
    {
        $this->seed('UsersTableSeeder');
        $response = $this->authenticate()->withHeaders(['Content-Type'=>'application/json','X-Requested-With'=>'XMLHttpRequest'])->json('get','/thread/1');
        $thread = Thread::with('user')->find(1);
        $response->assertStatus(200);
        $response->assertJsonFragment([$thread->user->toArray(),$thread->user->toArray()['name']]);
    }

}
