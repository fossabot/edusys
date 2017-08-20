<?php

use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function testShowLoginForm()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $user = factory(\App\User::class)->create(['password' => 'password']);
        $data = ['email' => $user->email, 'password' => 'password'];

        $response = $this->post('/login',$data);

        $response->assertStatus(201);
    }
}
