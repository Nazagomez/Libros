@extends('layouts.app')

@section('title', 'Edit — '.$book->title)

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Books</p>
        <h1>Edit book</h1>
        <p>{{ $book->title }}</p>
    </div>
    <div class="card detail-card">
        <form action="{{ route('books.update', $book) }}" method="post" novalidate>
            @csrf
            @method('PUT')
            @include('books._form', ['book' => $book, 'authors' => $authors, 'publishers' => $publishers])
            <div class="form-actions-row">
                <button class="btn btn--primary" type="submit">Save changes</button>
                <a class="btn btn--ghost" href="{{ route('books.show', $book) }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
