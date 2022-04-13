<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type = "text/css"> 
        .div_center{
          text-align : center;
          padding-top : 40px;

        }
        .h2font{
          font-size : 40px;
          padding-bottom : 40px;
        }
        .input_color{
          color:black;
        }
      </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      
      <div class="main-panel">
          <div class="content-wrapper">
          <div class="div_center">
            <h2 class="h2font">ADD CATAGORY</h2>
          
          <form action ="{{url('/add_category')}}" method="">
            @csrf
            <input class="input_color" type = "text" name="name" placeholder ="Write category name">
            <input type ="submit" name="submit" class ="btn btn-primary"  value="Add category" >
          </form>
          </div>
          </div>  
      </div> 
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

  </body>
</html>