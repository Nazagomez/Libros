@extends('layouts.app')

@section('title', 'Publishers')

@section('content')
    <div class="page-hero">
        <p class="page-hero__eyebrow">Imprints</p>
        <h1>Publishers</h1>
        <p>Browse houses, countries of origin, and the titles they publish here.</p>
    </div>
    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Founded</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr>
                        <td><a href="{{ route('publishers.show', $publisher['id']) }}">{{ $publisher['name'] }}</a></td>
                        <td>{{ $publisher['country'] }}</td>
                        <td>{{ $publisher['founded'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
