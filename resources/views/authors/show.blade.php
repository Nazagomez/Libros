@extends('layouts.app')

@section('title', $author->name)

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Author</p>
        <h1>{{ $author->name }}</h1>
        <div class="chip-row">
            <span class="chip chip--accent">{{ $author->nationality }}</span>
            <span class="chip">Born {{ $author->birth }}</span>
        </div>
        <div class="hero-actions">
            <a class="btn btn--primary" href="{{ route('authors.edit', $author) }}">Edit</a>
            <a class="btn btn--ghost" href="{{ route('authors.index') }}">All authors</a>
        </div>
    </div>
    <div class="card detail-card">
        <h2 class="detail-card__title">Profile</h2>
        <dl class="detail-list">
            <dt>Fields</dt>
            <dd>{{ $author->fields }}</dd>
            <dt>Books</dt>
            <dd>
                <ul class="link-list">
                    @forelse ($author->books as $b)
                        <li><a href="{{ route('books.show', $b) }}">{{ $b->title }}</a></li>
                    @empty
                        <li><span class="chip">No books yet</span></li>
                    @endforelse
                </ul>
            </dd>
        </dl>
    </div>
    <a class="back-link" href="{{ route('authors.index') }}">Back to authors</a>
@endsection
