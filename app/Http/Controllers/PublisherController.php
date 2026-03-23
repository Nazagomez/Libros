<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PublisherController extends Controller
{
    /**
     * @return array<int, array<string, mixed>>
     */
    private static function publishers(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'John Wiley & Sons',
                'country' => 'United States',
                'founded' => 1807,
                'genre' => 'Academic',
                'book_ids' => [1, 2],
            ],
            [
                'id' => 2,
                'name' => 'Pearson Education',
                'country' => 'United Kingdom',
                'founded' => 1844,
                'genre' => 'Education',
                'book_ids' => [3, 4],
            ],
        ];
    }

    /**
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
        return view('publishers.index', [
            'publishers' => self::publishers(),
        ]);
    }

    public function show(int $id): View
    {
        $publisher = collect(self::publishers())->firstWhere('id', $id);
        if ($publisher === null) {
            abort(404);
        }
        $books = [];
        foreach ($publisher['book_ids'] as $bookId) {
            $books[] = [
                'id' => $bookId,
                'title' => self::bookTitles()[$bookId] ?? 'Unknown',
            ];
        }

        return view('publishers.show', [
            'publisher' => $publisher,
            'books' => $books,
        ]);
    }
}
