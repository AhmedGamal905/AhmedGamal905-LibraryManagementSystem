<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAccessTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();


        $this->admin = User::factory()->create(['type' => 'admin']);
        $this->user = User::factory()->create();
    }

    public function test_admin_has_access_to_create_new_books(): void
    {

        $this->actingAs($this->admin);


        $response = $this->get('/admin/books/create');


        $response->assertStatus(200);
    }
    public function test_user_can_not_access_to_create_new_books(): void
    {

        $this->actingAs($this->user);


        $response = $this->get('/admin/books/create');


        $response->assertStatus(403);
    }
}
