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
      @include('admin.body')
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

