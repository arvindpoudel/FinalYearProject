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
          <!-- @if(session()->has('message'))
            <div class="alert alert-success">
              {{session()->get('message')}}
            </div>

          @endif -->
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rating</h4>
                  <p class="card-description">
                  <button type="submit" class="btn btn-success "><a href="{{url('movie_index')}}">Rating List</a></button>
                    
                  </p>
                  
                  <form class="forms-sample" action="{{url('/add_movie')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">User</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="title" placeholder="user">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Movie</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="genre" placeholder="movie">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Rating</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="genre" placeholder="rating">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
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

