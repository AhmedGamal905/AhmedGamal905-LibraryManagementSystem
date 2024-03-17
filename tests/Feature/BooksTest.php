<?php

namespace Tests\Feature;

use App\Enums\UserType;
use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use Database\Seeders\BookSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    use RefreshDatabase;
    protected Book $book;
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(BookSeeder::class);
        $this->seed(UserSeeder::class);
        $this->admin = User::where('type', UserType::ADMIN)->first();
        $this->book = Book::first();
    }

    public function test_admin_can_store(): void
    {

        $this->actingAs($this->admin);

        $newData = [
            'name' => 'New book',
            'description' => 'New book Description',
            'writer' => 'New book Writer',
        ];

        $response = $this->post(route('admin.books.store'), $newData);

        $response->assertRedirect(route('admin.books.index'));

        $this->assertDatabaseHas('books', $newData);

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