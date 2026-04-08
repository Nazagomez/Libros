@extends('layouts.app')

@section('title', 'Controllers and views')

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Architecture</p>
        <h1>Controllers, models &amp; views</h1>
        <p>Routes invoke controllers; controllers read and write SQLite through Eloquent models; Blade renders HTML.</p>
    </div>
    <div class="diagram-box">
        <pre>┌──────────────────────────────────────────────────────────────────────────────┐
│  SQLite database/database.sqlite                                               │
│  tables: authors, publishers, books (FK: author_id, publisher_id)              │
└──────────────────────────────────────────────────────────────────────────────┘
         ▲                    ▲                    ▲
         │ Eloquent           │                    │
┌────────┴────────┐  ┌────────┴─────────┐  ┌───────┴──────────┐
│ Author          │  │ Publisher        │  │ Book             │
│ (model)         │  │ (model)          │  │ (model)          │
└────────┬────────┘  └────────┬─────────┘  └───────┬──────────┘
         │                    │                    │
         ▼                    ▼                    ▼
┌─────────────────┐  ┌──────────────────┐  ┌───────────────────┐
│ AuthorController│  │ PublisherController│  │ BookController    │
│ index create    │  │ index create      │  │ index create      │
│ store show      │  │ store show        │  │ store show        │
│ edit update     │  │ edit update       │  │ edit update       │
└────────┬────────┘  └────────┬─────────┘  └────────┬──────────┘
         │                    │                     │
         ▼                    ▼                     ▼
┌─────────────────┐  ┌──────────────────┐  ┌───────────────────┐
│ authors/        │  │ publishers/       │  │ books/            │
│ index create    │  │ index create      │  │ index create      │
│ edit show       │  │ edit show         │  │ edit show         │
└────────┬────────┘  └────────┬─────────┘  └────────┬──────────┘
         │                    │                     │
         └────────────────────┴─────────────────────┘
                              │
                              ▼
                    ┌──────────────────┐
                    │ layouts/app      │
                    └──────────────────┘

routes/web.php  →  Route::resource(...) for books, authors, publishers (no destroy)
GET /diagram  →  diagram.blade (this page)</pre>
    </div>
@endsection
