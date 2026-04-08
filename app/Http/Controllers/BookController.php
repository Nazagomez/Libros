<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->with(['author', 'publisher'])
            ->orderBy('title')
            ->get();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function create(): View
    {
        $authors = Author::query()->orderBy('name')->get();
        $publishers = Publisher::query()->orderBy('name')->get();

        return view('books.create', [
            'authors' => $authors,
            'publishers' => $publishers,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'edition' => 'required|string|max:50',
            'copyright' => 'required|integer|min:1000|max:'.(int) date('Y'),
            'language' => 'required|string|max:50',
            'pages' => 'required|integer|min:1',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);
        $book = Book::query()->create($validated);

        return redirect()
            ->route('books.show', $book)
            ->with('status', 'Book created.');
    }

    public function show(Book $book): View
    {
        $book->load(['author', 'publisher']);

        return view('books.show', [
            'book' => $book,
        ]);
    }

    public function edit(Book $book): View
    {
        $authors = Author::query()->orderBy('name')->get();
        $publishers = Publisher::query()->orderBy('name')->get();

        return view('books.edit', [
            'book' => $book,
            'authors' => $authors,
            'publishers' => $publishers,
        ]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'edition' => 'required|string|max:50',
            'copyright' => 'required|integer|min:1000|max:'.(int) date('Y'),
            'language' => 'required|string|max:50',
            'pages' => 'required|integer|min:1',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);
        $book->update($validated);

        return redirect()
            ->route('books.show', $book)
            ->with('status', 'Book updated.');
    }
}
