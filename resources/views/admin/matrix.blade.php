<table>
    <thead>
        <tr>
            <th>User ID</th>
            @foreach ($matrix[1] as $movie_id => $rating)
                <th>Movie {{ $movie_id }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($matrix as $user_id => $ratings)
            <tr>
                <td>{{ $user_id }}</td>
                @foreach ($ratings as $rating)
                    <td>{{ $rating }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
