@extends('layouts.app')

@section('title', 'New book')

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Books</p>
        <h1>Add a book</h1>
        <p>Link the title to an author and a publisher already in the catalog.</p>
    </div>
    <div class="card detail-card">
        <form action="{{ route('books.store') }}" method="post" novalidate>
            @csrf
            @include('books._form', ['book' => null, 'authors' => $authors, 'publishers' => $publishers])
            <div class="form-actions-row">
                <button class="btn btn--primary" type="submit">Create book</button>
                <a class="btn btn--ghost" href="{{ route('books.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
