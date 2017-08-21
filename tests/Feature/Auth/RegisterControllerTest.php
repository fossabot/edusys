<?php


use Tests\TestCase;
use Faker\Factory as Faker;

class RegisterControllerTest extends TestCase
{
    public function testShowRegistrationForm()
    {
        $response = $this->get('register');

        $response->assertStatus(200);
 }

    public function testRegister()
    {
        $faker = Faker::create();
        $password =$faker->password(6);
        $data = ['name' => $faker->name(),'email' => $faker->email, 'password' => $password,'password_confirmation' => $password];

        $response = $this->post('/register',$data);

        $response = $this->followRedirects($response);
        $response->assertSee('Dashboard');
 }
}
