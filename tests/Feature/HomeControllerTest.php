<?php

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $user = factory(EduSys\Models\User::class)->create(['password' => 'password']);

        // Authenticate user
        Auth::login($user);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
