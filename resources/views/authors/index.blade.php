@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">People</p>
        <h1>Authors</h1>
        <p>Open a profile to see research fields and every book in this catalog.</p>
    </div>
    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Nationality</th>
                    <th>Birth</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td><a href="{{ route('authors.show', $author['id']) }}">{{ $author['name'] }}</a></td>
                        <td>{{ $author['nationality'] }}</td>
                        <td>{{ $author['birth'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
