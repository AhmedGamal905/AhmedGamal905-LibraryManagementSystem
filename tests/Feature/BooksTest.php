<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class BooksTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_admin_can_view_index(): void
    {
        $admin = User::factory()->admin()->create();

        $this
            ->actingAs($admin)
            ->get(route('admin.books.index'))
            ->assertStatus(200)
            ->assertViewHas('books');
    }

    public function test_admin_can_store(): void
    {
        $admin = User::factory()->admin()->create();
        $newBook = Book::factory()->make();

        $this
            ->actingAs($admin)
            ->post(route('admin.books.store'), $newBook->toArray())
            ->assertRedirect(route('admin.books.index'));

        $this->assertDatabaseHas('books', $newBook->toArray());
    }

    public function test_admin_can_update(): void
    {
        $admin = User::factory()->admin()->create();

        $book = Book::factory()->create();

        $updateBook = Book::factory()->make();

        $this
            ->actingAs($admin)
            ->put(route('admin.books.update', $book->id), $updateBook->toArray())
            ->assertRedirect(route('admin.books.index'));

        $this->assertDatabaseHas('books', $updateBook->toArray());
    }

    public function test_data_soft_delete(): void
    {
        $admin = User::factory()->admin()->create();

        $book = Book::factory()->create();

        $this
            ->actingAs($admin)
            ->delete(route('admin.books.destroy', $book->id))
            ->assertRedirect(route('admin.books.index'));

        $this->assertSoftDeleted('books', ['id' => $book->id]);
    }
}
