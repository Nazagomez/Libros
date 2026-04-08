<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(): View
    {
        $publishers = Publisher::query()->orderBy('name')->get();

        return view('publishers.index', [
            'publishers' => $publishers,
        ]);
    }

    public function create(): View
    {
        return view('publishers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'founded' => 'required|integer|min:1000|max:'.(int) date('Y'),
            'genre' => 'required|string|max:255',
        ]);
        $publisher = Publisher::query()->create($validated);

        return redirect()
            ->route('publishers.show', $publisher)
            ->with('status', 'Publisher created.');
    }

    public function show(Publisher $publisher): View
    {
        $publisher->load(['books' => fn ($query) => $query->orderBy('title')]);

        return view('publishers.show', [
            'publisher' => $publisher,
        ]);
    }

    public function edit(Publisher $publisher): View
    {
        return view('publishers.edit', [
            'publisher' => $publisher,
        ]);
    }

    public function update(Request $request, Publisher $publisher): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'founded' => 'required|integer|min:1000|max:'.(int) date('Y'),
            'genre' => 'required|string|max:255',
        ]);
        $publisher->update($validated);

        return redirect()
            ->route('publishers.show', $publisher)
            ->with('status', 'Publisher updated.');
    }
}
