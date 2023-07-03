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
        @if(session()->has('delete'))
            <div class="alert alert-success">
              {{session()->get('delete')}}
            </div>

          @endif
        <div class="row">
            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Movie List</h4>
                  <p class="card-description">
                  <button type="submit" class="btn btn-success "><a href="{{url('movie_create')}}"> Add movie</a></button>
                    
                  </p>
                  <div class="table-responsive">
                    <table class="table" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Items</th>
                          <th>Genres</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->genre}}</td>
                                <td>
                                <button type="submit" class="btn btn-danger" ><a onclick="return confirm('Are you sure  to delete')" href="{{url('delete_movie',$data->id)}}">Delete</a></button> 
                               
         
                                </td>
                            </tr>
                        @endforeach
                        
                        
            
                        
                      </tbody>
                    </table>
                  </div>
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

