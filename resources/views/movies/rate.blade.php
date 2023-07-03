@extends('layout.app')

@section('content')
    
    @if ($previous_rating)
        <div class="previous-rating">
            <p>Your previous rating:</p>
            <h2>{{ $previous_rating->rating }}</h2>
        </div>
    @endif
    <form class="form_rate" action="{{ route('movies.submitRating', $movie->id) }}" method="POST">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
        @csrf
        <div class="star-rating">
            <img src="" alt="movie picture">
            <h2>{{$movie->title}}</h2>
            <h4>{{$movie->genre}}</h4>
            <input type="radio" id="star-5" name="rating" value="5"{{ $previous_rating && $previous_rating->rating == 5 ? 'checked' : '' }}>
            <label for="star-5" title="5 stars">
                <i class="active fa fa-star"></i>
            </label>
            <input type="radio" id="star-4" name="rating" value="4"{{ $previous_rating && $previous_rating->rating == 4 ? 'checked' : '' }}>
            <label for="star-4" title="4 stars">
                <i class="active fa fa-star"></i>
            </label>
            <input type="radio" id="star-3" name="rating" value="3"{{ $previous_rating && $previous_rating->rating == 3? 'checked' : '' }}>
            <label for="star-3" title="3 stars">
                <i class="active fa fa-star"></i>
            </label>
            <input type="radio" id="star-2" name="rating" value="2"{{ $previous_rating && $previous_rating->rating == 2 ? 'checked' : '' }}>
            <label for="star-2" title="2 stars">
                <i class="active fa fa-star"></i>
            </label>
            <input type="radio" id="star-1" name="rating" value="1"{{ $previous_rating && $previous_rating->rating == 1 ? 'checked' : '' }}>
            <label for="star-1" title="1 star">
                <i class="active fa fa-star"></i>
            </label>
        </div>
   
        <button type="submit">Submit</button>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </form>
    
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('front/rate.css') }}">
    
    <style>
        .star-rating {
            display: inline-block;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating i.fa {
            font-size: 40px;
            color: #ccc;
            transition: color 0.2s;
        }

        .star-rating input[type="radio"]:checked ~ label i.fa {
            color: #ffcc00;
        }

        .star-rating label {
            display: inline-block;
            cursor: pointer;
        }

        .star-rating label:hover i.fa {
            color: #ffcc00;
        }
    </style>
@endsection
