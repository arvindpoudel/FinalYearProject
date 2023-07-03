
<body>
@extends('layout.app')
@section('content')
    <h1> Top Rated Recommended Movies</h1>
   
    
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Average Rate</th>
            <th>Genre</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                  <td>{{ number_format($movie_ratings[$movie->id], 1) }}</td>
                <td>{{ $movie->genre }}</td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
    <br><br>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('front/home.css') }}">
@endsection
</body>

