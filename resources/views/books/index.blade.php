@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Catalog</p>
        <h1>Books</h1>
        <p>Explore titles, editions, and jump to each book’s author and publisher.</p>
    </div>
    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Edition</th>
                    <th>Copyright</th>
                    <th>Pages</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td><a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a></td>
                        <td>{{ $book['edition'] }}</td>
                        <td>{{ $book['copyright'] }}</td>
                        <td>{{ number_format($book['pages']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
