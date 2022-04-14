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
        label{
            display: inline-block;
            width:200px;
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

          @if(session()->has('message'))
            <div class = "alert alert-success">
              <button type="button" class ="close" data-dismiss="alert"
              aria-hidden="true">X
                </button>
              {{session()->get('message')}}
          </div>
          @endif

          <h2 class="h2font">ADD TRIP</h2>
          
          <form action ="{{url('/add_trip')}}" method="POST"  enctype="multipart/from-data">

            @csrf
            <div>
            <label>Trip name </label>
            <input type = "text" class="input_color"  name="title" placeholder ="Write trip name" required="">
            </div>
               
            <div>
            <label>Desctiption of trip </label>
            <input type = "text" class="input_color"  name="description" placeholder ="Description of trip" required="">
            </div>
            
            

            <div>
            <label>Time </label>
            <input type = "text" class="input_color"  name="time" placeholder ="Time" required="">
            </div>

            <div>
            <label>Quantity </label>
            <input type = "number" class="input_color" min="0" name="quantity" placeholder ="Quantity" required="">
            </div>

            <div>
            <label>Price </label>
            <input type = "number" class="input_color"  name="price" placeholder ="Price" required="">
            </div>

            <div>
            <label>Discount </label>
            <input type = "number" class="input_color"  name="discoount" placeholder ="Discount" required="">
            </div>

            <div>
            <label>Category </label>
            <select class="input_color" name="category" required="">
           @foreach($catagory as $catagory)

            <option value= "{{$catagory->id}}">{{$catagory->catagory_name}}</option>
            @endforeach
            </select>
            </div>


            <div>
            <label>Image </label>
            <input type = "file" class="input_color"  name="image" placeholder ="Image" required="">
             </div>

            <input type ="submit"  class ="btn btn-primary" name="submit" value="Add trip" >
          
          </form>





            </div>
        </div>
        <!-- partial -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

  </body>
</html>