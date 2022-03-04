<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_screen_can_be_rendered()
    {
        $this->assertTrue(true);
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
