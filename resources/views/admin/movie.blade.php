<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.header')
</head>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
    @include('admin.nav')
    @include('admin.slidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              {{session()->get('message')}}
            </div>

          @endif
        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card"style="width: 800px; height: 600px;">
                <div class="card-body">
                  <h4 class="card-title">Movie form</h4>
                  <p class="card-description">
                  <button type="submit" class="btn btn-success "><a href="{{url('movie_index')}}">Movie List</a></button>
                    
                  </p>
                  
                  <form class="forms-sample" action="{{url('/add_movie')}}" method="POST">
                    @csrf
                    <div class="form-group" >
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Genre</label>
                      <select id="genre" name="genre" class="form-control" id="exampleInputUsername1">
                            <option value="Sci-Fi">Sci-Fi</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Horror">Horror</option>
                            <option value="Crime">Crime</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Drama">Drama</option>
                            <option value="Romance">Romance</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Children">Children</option>
                            <option value="Animation">Animation</option>
                            <option value="Adventure">Adventure</option>
                        </select>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel </button>
                  </form>
                </div>
              </div>
            </div>
            
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
 @include('admin.script')
</body>

</html>

