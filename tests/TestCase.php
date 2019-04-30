<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * create a uer and authnticate for tests
     */
    public function authenticate()
    {
        $user = factory(User::class)->create();
        return $this->actingAs($user);
    }

    public function ajax(){
        return $this->withHeaders(['Content-Type' => 'application/json', 'X-Requested-With' => 'XMLHttpRequest']);
    }
}
