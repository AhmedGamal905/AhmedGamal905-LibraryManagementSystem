<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class UserAccessTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_admin_has_access_to_create_new_books(): void
    {
        $admin = User::factory()->admin()->create();

        // TODO: using route name
        $this
            ->actingAs($admin)
            ->get('/admin/books/create')
            ->assertStatus(200);
    }

    public function test_user_can_not_access_to_create_new_books(): void
    {
        $user = User::factory()->create();

        // TODO: using route name
        $this
            ->actingAs($user)
            ->get('/admin/books/create')
            ->assertStatus(403);
    }
}
