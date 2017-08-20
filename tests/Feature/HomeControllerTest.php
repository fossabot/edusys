<?php

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
