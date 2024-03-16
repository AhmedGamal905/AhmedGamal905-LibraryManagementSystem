<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    use RefreshDatabase;
    protected Book $book;
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create(['type' => 'admin']);
        $this->book = Book::factory()->create();
    }

    public function test_data_count_stored_in_database(): void
    {

        $this->assertDatabaseCount('books', 1);
    }
    public function test_admin_can_update(): void
    {

        $this->actingAs($this->admin);

        $updateData = [
            'name' => 'Updated Book Name',
            'description' => 'Updated Description',
            'writer' => 'Updated Writer',
        ];

        $response = $this->put(route('admin.books.update', $this->book->id), $updateData);

        $response->assertRedirect(route('admin.books.index'));

        $this->assertDatabaseHas('books', [
            'id' => $this->book->id,
            'name' => 'Updated Book Name',
            'description' => 'Updated Description',
            'writer' => 'Updated Writer',
        ]);
    }
    public function test_data_soft_delete(): void
    {
        $this->actingAs($this->admin);

        $response = $this->delete(route('admin.books.destroy', $this->book->id));

        $response->assertRedirect(route('admin.books.index'));

        $this->assertSoftDeleted('books', [
            'id' => $this->book->id,
        ]);
    }
}