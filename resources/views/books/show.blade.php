@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Book</p>
        <h1>{{ $book->title }}</h1>
        <div class="chip-row">
            <span class="chip chip--accent">{{ $book->edition }} edition</span>
            <span class="chip">{{ $book->language }}</span>
            <span class="chip">{{ number_format($book->pages) }} pages</span>
        </div>
        <div class="hero-actions">
            <a class="btn btn--primary" href="{{ route('books.edit', $book) }}">Edit</a>
            <a class="btn btn--ghost" href="{{ route('books.index') }}">All books</a>
        </div>
    </div>
    <div class="card detail-card">
        <h2 class="detail-card__title">Details</h2>
        <dl class="detail-list">
            <dt>Copyright</dt>
            <dd>{{ $book->copyright }}</dd>
            <dt>Author</dt>
            <dd>
                @if ($book->author)
                    <a href="{{ route('authors.show', $book->author) }}">{{ $book->author->name }}</a>
                @else
                    —
                @endif
            </dd>
            <dt>Publisher</dt>
            <dd>
                @if ($book->publisher)
                    <a href="{{ route('publishers.show', $book->publisher) }}">{{ $book->publisher->name }}</a>
                @else
                    —
                @endif
            </dd>
        </dl>
    </div>
    <a class="back-link" href="{{ route('books.index') }}">Back to all books</a>
@endsection
