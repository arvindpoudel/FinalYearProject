<body>
@extends('layout.app')
@section('content')
    <h1>Movies List</h1>
    <form action="{{ route('movies.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search movies by title">
        <button type="submit">Search</button>
    </form>
    @if ($movies->isEmpty())
        <p>No movies found</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Rate Movie</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td><a href="{{ route('movies.rate', $movie->id) }}">Rate</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>
    @endif
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('front/home.css') }}">
@endsection
</body>
