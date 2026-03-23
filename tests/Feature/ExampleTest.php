<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_redirects_to_books_index(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('books.index'));
    }

    public function test_books_index_returns_successful_response(): void
    {
        $response = $this->get(route('books.index'));

        $response->assertStatus(200);
    }
}
