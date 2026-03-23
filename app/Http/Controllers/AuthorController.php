<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    /**
     * @return array<int, array<string, mixed>>
     */
    private static function authors(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Abraham Silberschatz',
                'nationality' => 'Israelis / American',
                'birth' => 1952,
                'fields' => 'Database Systems, Operating Systems',
                'book_ids' => [1, 2],
            ],
            [
                'id' => 2,
                'name' => 'Andrew S. Tanenbaum',
                'nationality' => 'Dutch / American',
                'birth' => 1944,
                'fields' => 'Distributed computing, Operating Systems',
                'book_ids' => [3, 4],
            ],
        ];
    }

    /**
     * Titles for book_ids (same as BookController).
     *
     * @return array<int, string>
     */
    private static function bookTitles(): array
    {
        return [
            1 => 'Operating System Concepts',
            2 => 'Database System Concepts',
            3 => 'Computer Networks',
            4 => 'Modern Operating Systems',
        ];
    }

    public function index(): View
    {
        return view('authors.index', [
            'authors' => self::authors(),
        ]);
    }

    public function show(int $id): View
    {
        $author = collect(self::authors())->firstWhere('id', $id);
        if ($author === null) {
            abort(404);
        }
        $books = [];
        foreach ($author['book_ids'] as $bookId) {
            $books[] = [
                'id' => $bookId,
                'title' => self::bookTitles()[$bookId] ?? 'Unknown',
            ];
        }

        return view('authors.show', [
            'author' => $author,
            'books' => $books,
        ]);
    }
}
