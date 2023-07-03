<!DOCTYPE html>
<html>
<head>
    <title>Movies List</title>
    <meta name="description" content="Minimal HTML code."> 
    <style>
        .main {
            background-color: #fff;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-top: 50px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            border: 2px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: #005580;
            text-decoration: none;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #1E90FF;
            border: 1px solid blue;
            border-radius: 15px;
            font-size: 18px;
        
            cursor: pointer;
        }
        button a{
            color:white;
        }
        button:hover {
            background-color: #696969;
            
        }
    </style>
</head>

<body>
<div class="main">
<h1>Movies List</h1>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Genre</th>
        <th>Rate the Movie</th>
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
<button><a href="{{ route('movies.index') }}">See All movies</a></button>
</div>
<br><br>
</body>
</html>
