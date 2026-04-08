@extends('layouts.app')

@section('title', 'Edit — '.$publisher->name)

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Publishers</p>
        <h1>Edit publisher</h1>
        <p>{{ $publisher->name }}</p>
    </div>
    <div class="card detail-card">
        <form action="{{ route('publishers.update', $publisher) }}" method="post" novalidate>
            @csrf
            @method('PUT')
            <div class="form-stack">
                <div class="form-field">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $publisher->name) }}" required maxlength="255">
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="country">Country</label>
                    <input id="country" name="country" type="text" value="{{ old('country', $publisher->country) }}" required maxlength="255">
                    @error('country')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="founded">Founded (year)</label>
                    <input id="founded" name="founded" type="number" value="{{ old('founded', $publisher->founded) }}" required min="1000" max="{{ (int) date('Y') }}">
                    @error('founded')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="genre">Genre</label>
                    <input id="genre" name="genre" type="text" value="{{ old('genre', $publisher->genre) }}" required maxlength="255">
                    @error('genre')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-actions-row">
                <button class="btn btn--primary" type="submit">Save changes</button>
                <a class="btn btn--ghost" href="{{ route('publishers.show', $publisher) }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
