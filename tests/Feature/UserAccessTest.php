<?php

namespace Tests\Feature;

use App\Enums\UserType;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAccessTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);
        $this->admin = User::where('type', UserType::ADMIN)->first();
        $this->user = User::where('type', UserType::USER)->first();
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
