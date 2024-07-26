<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get("/api/posts");

        $response->assertStatus(200);
    }

    public function test_has_all_the_required_post_data()
    {
        // Seeder adds 10 posts to the database in abstract class
        $this->assertDatabaseCount("posts", 10);
    }

    // public function test_create_new_post(): void
    // {
    //     $row = [
    //         "title" => "Test Post",
    //         "description" => "Description for test post",
    //         "website" => "example.com",
    //     ];
    //     $response = $this->postJson("/api/posts", $row);

    //     $response->assertStatus(201)->assertJson([
    //         "created" => true,
    //     ]);
    // }
}
