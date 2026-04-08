<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::query()->orderBy('name')->get();

        return view('authors.index', [
            'authors' => $authors,
        ]);
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth' => 'required|integer|min:1000|max:'.(int) date('Y'),
            'fields' => 'required|string|max:500',
        ]);
        $author = Author::query()->create($validated);

        return redirect()
            ->route('authors.show', $author)
            ->with('status', 'Author created.');
    }

    public function show(Author $author): View
    {
        $author->load(['books' => fn ($query) => $query->orderBy('title')]);

        return view('authors.show', [
            'author' => $author,
        ]);
    }

    public function edit(Author $author): View
    {
        return view('authors.edit', [
            'author' => $author,
        ]);
    }

    public function update(Request $request, Author $author): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth' => 'required|integer|min:1000|max:'.(int) date('Y'),
            'fields' => 'required|string|max:500',
        ]);
        $author->update($validated);

        return redirect()
            ->route('authors.show', $author)
            ->with('status', 'Author updated.');
    }
}
