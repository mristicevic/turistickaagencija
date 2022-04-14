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
        .center{
          margin:auto;
          width: 50%;
          text-align:center;
          margin-top: 30px;
          border: 3px solid purple;
          background: #163376;

        }
        .center tr:first-child td {
          color: Violet;
          font-weight: bold;
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
          @if(session()->has('message'))
            <div class = "alert alert-success">
              <button type="button" class ="close" data-dismiss="alert"
              aria-hidden="true">X
                </button>
              {{session()->get('message')}}
          </div>
          @endif
            <h2 class="h2font">ADD CATEGORY</h2>
          
          <form action ="{{url('/add_category')}}" method="POST">

            @csrf

            <input type = "text" class="input_color"  name="catagory" placeholder ="Write category name">
            <input type ="submit"  class ="btn btn-primary" name="submit" value="Add category" >
          
          </form>

          <table class="center">
            <tr>
            <td>CATEGORY NAME</td>
              <td>ACTION</td>
            </tr>
            @foreach($data as $data)
            <tr>
            <td>{{$data->catagory_name}}</td>
            <td><a class ="btn btn-danger" href="{{url('/delete_category',$data->id)}}">Delete </a>  </td>
            </tr>
            @endforeach
         </table>

          </div>
          </div>  
      </div> 
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

  </body>
</html>