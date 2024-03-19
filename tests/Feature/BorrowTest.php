<?php

namespace Tests\Feature;

use App\Enums\BookStatus;
use App\Enums\BorrowStatus;
use App\Enums\UserType;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Database\Seeders\BookSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class BorrowTest extends TestCase
{
    use RefreshDatabase;

    protected Book $book;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(BookSeeder::class);
        $this->seed(UserSeeder::class);
        $this->user = User::where('type', UserType::USER)->first();
        $this->book = Book::first();
    }

    public function test_user_can_view_index(): void
    {
        $this->actingAs($this->user);

        $response = $this->get(route('user.borrow.index'));

        $response->assertStatus(200);

        $response->assertViewHas('borrowedBooks');
    }

    public function test_user_can_store(): void
    {
        $this->actingAs($this->user);

        $response = $this->put(route('user.borrow.store', $this->book));

        $response->assertRedirect(route('user.borrow.index'));

        $this->assertEquals(BookStatus::UNAVAILABLE->value, $this->book->fresh()->status);
    }

    public function test_user_can_update(): void
    {
        $this->actingAs($this->user);

        $borrowedBook = Borrow::create([
            'due_date' => Carbon::now()->addWeek(),
            'book_id' => $this->book->id,
            'status' => BorrowStatus::INPROGRESS,
            'user_id' => $this->user->id,
        ]);

        $response = $this->put(route('user.borrow.update', $borrowedBook));

        $response->assertRedirect(route('home'));

        $this->assertEquals(BookStatus::AVAILABLE->value, $borrowedBook->book->fresh()->status);
    }
}
