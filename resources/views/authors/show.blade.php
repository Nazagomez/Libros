@extends('layouts.app')

@section('title', $author['name'])

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Author</p>
        <h1>{{ $author['name'] }}</h1>
        <div class="chip-row">
            <span class="chip chip--accent">{{ $author['nationality'] }}</span>
            <span class="chip">Born {{ $author['birth'] }}</span>
        </div>
    </div>
    <div class="card detail-card">
        <h2 class="detail-card__title">Profile</h2>
        <dl class="detail-list">
            <dt>Fields</dt>
            <dd>{{ $author['fields'] }}</dd>
            <dt>Books</dt>
            <dd>
                <ul class="link-list">
                    @foreach ($books as $b)
                        <li><a href="{{ route('books.show', $b['id']) }}">{{ $b['title'] }}</a></li>
                    @endforeach
                </ul>
            </dd>
        </dl>
    </div>
    <a class="back-link" href="{{ route('authors.index') }}">Back to authors</a>
@endsection
