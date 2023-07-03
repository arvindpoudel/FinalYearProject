<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update table</title>
</head>
<body>
<div class="row">
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card"style="width: 800px; height: 600px;">
                <div class="card-body">
                  <h4 class="card-title">Movie form</h4>
                  <p class="card-description">
                  <button type="submit" class="btn btn-success "><a href="{{url('movie_index')}}">Movie List</a></button>
                    
                  </p>
                  
                  <form class="forms-sample" action="{{url('/add_movie/'.$movie->id)}}" method="POST">
                    @csrf
                    <div class="form-group" >
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text" class="form-control" id="exampleInputUsername1"  value="{{$movie->title}}" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Genre</label>
                      <select id="genre" name="genre" class="form-control" id="exampleInputUsername1">
                      <option value="Sci-Fi" {{$movie->genre == 'Sci-Fi' ? 'selected' : ''}}>Sci-Fi</option>
                      <option value="Mystery" {{$movie->genre == 'Mystery' ? 'selected' : ''}}>Mystery</option>
                      <option value="Horror" {{$movie->genre == 'Horror' ? 'selected' : ''}}>Horror</option>
                      <option value="Crime" {{$movie->genre == 'Crime' ? 'selected' : ''}}>Crime</option>
                      <option value="Thriller" {{$movie->genre == 'Thriller' ? 'selected' : ''}}>Thriller</option>
                      <option value="Drama" {{$movie->genre == 'Drama' ? 'selected' : ''}}>Drama</option>
                      <option value="Romance" {{$movie->genre == 'Romance' ? 'selected' : ''}}>Romance</option>
                      <option value="Fantasy" {{$movie->genre == 'Fantasy' ? 'selected' : ''}}>Fantasy</option>
                      <option value="Children" {{$movie->genre == 'Children' ? 'selected' : ''}}>Children</option>
                      <option value="Animation" {{$movie->genre == 'Animation' ? 'selected' : ''}}>Animation</option>

                      </select>
                    </div>                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel </button>
                  </form>
                </div>
              </div>
            </div>
            
        </div>
</body>
</html>