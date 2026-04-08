@php
    /** @var \App\Models\Book|null $book */
@endphp
<div class="form-stack">
    <div class="form-field">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $book?->title) }}" required maxlength="255">
        @error('title')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label for="edition">Edition</label>
        <input id="edition" name="edition" type="text" value="{{ old('edition', $book?->edition) }}" required maxlength="50">
        @error('edition')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label for="copyright">Copyright year</label>
        <input id="copyright" name="copyright" type="number" value="{{ old('copyright', $book?->copyright) }}" required min="1000" max="{{ (int) date('Y') }}">
        @error('copyright')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label for="language">Language</label>
        <input id="language" name="language" type="text" value="{{ old('language', $book?->language) }}" required maxlength="50">
        @error('language')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label for="pages">Pages</label>
        <input id="pages" name="pages" type="number" value="{{ old('pages', $book?->pages) }}" required min="1">
        @error('pages')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label for="author_id">Author</label>
        <select id="author_id" name="author_id" required>
            <option value="" disabled {{ old('author_id', $book?->author_id) ? '' : 'selected' }}>Select author</option>
            @foreach ($authors as $authorOption)
                <option value="{{ $authorOption->id }}" @selected((int) old('author_id', $book?->author_id) === $authorOption->id)>
                    {{ $authorOption->name }}
                </option>
            @endforeach
        </select>
        @error('author_id')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label for="publisher_id">Publisher</label>
        <select id="publisher_id" name="publisher_id" required>
            <option value="" disabled {{ old('publisher_id', $book?->publisher_id) ? '' : 'selected' }}>Select publisher</option>
            @foreach ($publishers as $publisherOption)
                <option value="{{ $publisherOption->id }}" @selected((int) old('publisher_id', $book?->publisher_id) === $publisherOption->id)>
                    {{ $publisherOption->name }}
                </option>
            @endforeach
        </select>
        @error('publisher_id')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
</div>
