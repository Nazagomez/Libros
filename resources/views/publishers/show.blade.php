@extends('layouts.app')

@section('title', $publisher['name'])

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Publisher</p>
        <h1>{{ $publisher['name'] }}</h1>
        <div class="chip-row">
            <span class="chip chip--accent">{{ $publisher['country'] }}</span>
            <span class="chip">Est. {{ $publisher['founded'] }}</span>
            <span class="chip">{{ $publisher['genre'] }}</span>
        </div>
    </div>
    <div class="card detail-card">
        <h2 class="detail-card__title">Catalog</h2>
        <dl class="detail-list">
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
    <a class="back-link" href="{{ route('publishers.index') }}">Back to publishers</a>
@endsection
