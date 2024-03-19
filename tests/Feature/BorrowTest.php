<?php

namespace Tests\Feature;

use App\Enums\BookStatus;
use App\Enums\BorrowStatus;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class BorrowTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_user_can_view_index(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('user.borrow.index'))
            ->assertStatus(200)
            ->assertViewHas('borrowedBooks');
    }

    public function test_user_can_store(): void
    {
        $user = User::factory()->create();

        $book = Book::factory()->create();

        $this->actingAs($user)
            ->put(route('user.borrow.store', $book))
            ->assertRedirect(route('user.borrow.index'));

        $this->assertEquals(BookStatus::UNAVAILABLE, $book->fresh()->status);
    }

    public function test_user_can_update(): void
    {
        $user = User::factory()->create();

        $book = Book::factory()->create();

        // TODO: User factory should create a user with a borrowed book
        $borrowedBook = $book->borrows()->create([
            'due_date' => now()->addWeek(),
            'status' => BorrowStatus::INPROGRESS,
            'user_id' => $user->id,
        ]);

        $this
            ->actingAs($user)
            ->put(route('user.borrow.update', $borrowedBook))
            ->assertRedirect(route('home'));

        $this->assertEquals(BookStatus::AVAILABLE, $borrowedBook->book->fresh()->status);
    }
}
