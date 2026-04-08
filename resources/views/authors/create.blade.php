@extends('layouts.app')

@section('title', 'New author')

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Authors</p>
        <h1>Add an author</h1>
    </div>
    <div class="card detail-card">
        <form action="{{ route('authors.store') }}" method="post" novalidate>
            @csrf
            <div class="form-stack">
                <div class="form-field">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required maxlength="255">
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="nationality">Nationality</label>
                    <input id="nationality" name="nationality" type="text" value="{{ old('nationality') }}" required maxlength="255">
                    @error('nationality')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="birth">Birth year</label>
                    <input id="birth" name="birth" type="number" value="{{ old('birth') }}" required min="1000" max="{{ (int) date('Y') }}">
                    @error('birth')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="fields">Fields</label>
                    <textarea id="fields" name="fields" required maxlength="500">{{ old('fields') }}</textarea>
                    @error('fields')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-actions-row">
                <button class="btn btn--primary" type="submit">Create author</button>
                <a class="btn btn--ghost" href="{{ route('authors.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
