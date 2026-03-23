@extends('layouts.app')

@section('title', 'Controllers and views')

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Architecture</p>
        <h1>Controllers &amp; views</h1>
        <p>How routes map to controllers and Blade templates.</p>
    </div>
    <div class="diagram-box">
        <pre>┌─────────────────────────────────────────────────────────────────────────┐
│                           routes/web.php                                 │
│  GET /  │  /books  │  /books/{id}  │  /authors  │  /authors/{id}         │
│         │  /publishers  │  /publishers/{id}  │  /diagram                  │
└─────────────────────────────────────────────────────────────────────────┘
         │              │                │                  │
         ▼              ▼                ▼                  ▼
┌────────────┐  ┌──────────────┐  ┌────────────────┐  ┌──────────────────┐
│ (closure)  │  │ BookController│  │ AuthorController│  │ PublisherController│
│ redirect   │  │ index / show  │  │ index / show    │  │ index / show       │
└────────────┘  └───────┬───────┘  └────────┬───────┘  └─────────┬────────┘
                        │                   │                     │
                        ▼                   ▼                     ▼
                 ┌─────────────┐    ┌─────────────┐        ┌─────────────┐
                 │ books/      │    │ authors/    │        │ publishers/ │
                 │ index.blade │    │ index.blade │        │ index.blade │
                 │ show.blade  │    │ show.blade  │        │ show.blade  │
                 └─────────────┘    └─────────────┘        └─────────────┘
                        │                   │                     │
                        └───────────────────┴─────────────────────┘
                                            │
                                            ▼
                                   ┌─────────────────┐
                                   │ layouts/app.blade│
                                   └─────────────────┘

GET /diagram → diagram.blade</pre>
    </div>
@endsection
