@extends('layouts.app')

@section('title', 'Edit — '.$author->name)

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Authors</p>
        <h1>Edit author</h1>
        <p>{{ $author->name }}</p>
    </div>
    <div class="card detail-card">
        <form action="{{ route('authors.update', $author) }}" method="post" novalidate>
            @csrf
            @method('PUT')
            <div class="form-stack">
                <div class="form-field">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $author->name) }}" required maxlength="255">
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="nationality">Nationality</label>
                    <input id="nationality" name="nationality" type="text" value="{{ old('nationality', $author->nationality) }}" required maxlength="255">
                    @error('nationality')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="birth">Birth year</label>
                    <input id="birth" name="birth" type="number" value="{{ old('birth', $author->birth) }}" required min="1000" max="{{ (int) date('Y') }}">
                    @error('birth')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="fields">Fields</label>
                    <textarea id="fields" name="fields" required maxlength="500">{{ old('fields', $author->fields) }}</textarea>
                    @error('fields')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-actions-row">
                <button class="btn btn--primary" type="submit">Save changes</button>
                <a class="btn btn--ghost" href="{{ route('authors.show', $author) }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
