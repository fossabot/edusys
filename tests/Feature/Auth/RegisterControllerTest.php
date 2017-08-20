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
        $data = ['name' => $faker->name(),'email' => $faker->email, 'password' => $faker->password(6)];

        $response = $this->post('/register',$data);

        $response->assertStatus(201);
 }
}
