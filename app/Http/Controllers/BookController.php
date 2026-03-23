<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    /**
     * @return array<int, array<string, mixed>>
     */
    private static function books(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Operating System Concepts',
                'edition' => '9th',
                'copyright' => 2012,
                'language' => 'ENGLISH',
                'pages' => 976,
                'author_id' => 1,
                'publisher_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Database System Concepts',
                'edition' => '6th',
                'copyright' => 2010,
                'language' => 'ENGLISH',
                'pages' => 1376,
                'author_id' => 1,
                'publisher_id' => 1,
            ],
            [
                'id' => 3,
                'title' => 'Computer Networks',
                'edition' => '5th',
                'copyright' => 2010,
                'language' => 'ENGLISH',
                'pages' => 960,
                'author_id' => 2,
                'publisher_id' => 2,
            ],
            [
                'id' => 4,
                'title' => 'Modern Operating Systems',
                'edition' => '4th',
                'copyright' => 2014,
                'language' => 'ENGLISH',
                'pages' => 1136,
                'author_id' => 2,
                'publisher_id' => 2,
            ],
        ];
    }

    /**
     * Lookup for related links (same IDs as AuthorController / PublisherController).
     *
     * @return array<int, array{id: int, name: string}>
     */
    private static function authorSummaries(): array
    {
        return [
            1 => ['id' => 1, 'name' => 'Abraham Silberschatz'],
            2 => ['id' => 2, 'name' => 'Andrew S. Tanenbaum'],
        ];
    }

    /**
     * @return array<int, array{id: int, name: string}>
     */
    private static function publisherSummaries(): array
    {
        return [
            1 => ['id' => 1, 'name' => 'John Wiley & Sons'],
            2 => ['id' => 2, 'name' => 'Pearson Education'],
        ];
    }

    public function index(): View
    {
        return view('books.index', [
            'books' => self::books(),
        ]);
    }

    public function show(int $id): View
    {
        $book = collect(self::books())->firstWhere('id', $id);
        if ($book === null) {
            abort(404);
        }
        $authorId = (int) $book['author_id'];
        $publisherId = (int) $book['publisher_id'];
        $author = self::authorSummaries()[$authorId] ?? null;
        $publisher = self::publisherSummaries()[$publisherId] ?? null;

        return view('books.show', [
            'book' => $book,
            'author' => $author,
            'publisher' => $publisher,
        ]);
    }
}
