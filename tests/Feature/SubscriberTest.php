<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get("/api/subscribers");

        $response->assertStatus(200);
    }

    public function test_add_website_subscription(): void
    {
        $row = [
            "email" => "john@example.com",
            "website_id" => 3,
        ];
        $response = $this->putJson("/api/subscribers", $row);

        $response->assertStatus(204);
    }

    public function test_find_subscriber(): void
    {
        $id = 1;

        $response = $this->get("/api/subscribers/$id");

        $response->assertStatus(200)->assertJson([
            "id" => $id,
        ]);
    }
}
