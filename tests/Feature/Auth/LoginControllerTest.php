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
        $user = factory(EduSys\Models\User::class)->create(['password' => 'password']);
        $data = ['email' => $user->email, 'password' => 'password'];

        $response = $this->call('post','/login',$data);
        $response->assertStatus(302);
    }

    public function testLoginWithWrongCredentials()
    {
        $user = factory(EduSys\Models\User::class)->create(['password' => 'password']);
        $data = ['email' => $user->email, 'password' => 'wrongpassword'];

        $response = $this->call('post','/login',$data);
        $response = $this->followRedirects($response);
        $response->assertSee('Login');
    }
}
