<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
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

          <h2 class="h2font">UPDATE TRIP</h2>
          
          <form action ="{{url('/update_trip_confirm', $trip->id)}}" method="POST"  enctype="multipart/form-data">

            @csrf
            <div>
            <label>Trip name </label>
            <input type = "text" class="input_color"  name="title" placeholder ="Write trip name" required="" value="{{$trip->title}}">
            </div>
               
            <div>
            <label>Desctiption of trip </label>
            <input type = "text" class="input_color"  name="description" placeholder ="Description of trip" required="" value="{{$trip->description}}">
            </div>
            
            

            <div>
            <label>Time </label>
            <input type = "text" class="input_color"  name="time" placeholder ="Time" required="" value="{{$trip->time}}">
            </div>

            <div>
            <label>Quantity </label>
            <input type = "number" class="input_color" min="0" name="quantity" placeholder ="Quantity" required="" value="{{$trip->quantity}}">
            </div>

            <div>
            <label>Price </label>
            <input type = "number" class="input_color"  name="price" placeholder ="Price" required="" value="{{$trip->price}}"> 
            </div>

            <div>
            <label>Discount </label>
            <input type = "number" class="input_color"  name="discoount" placeholder ="Discount" required="" value="{{$trip->discount_price}}" >
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
            <label>Current image </label>
            <img  height="100" width="100" src="/trip/{{$trip->image}}">
        </div>

            <div>
            <label>New image </label>
            <input type = "file"   name="image" placeholder ="Image"  >
             </div>

            <input type ="submit"  class ="btn btn-primary" name="submit" value="Update trip" >
          
             </form>





            </div>
        </div>
        <!-- partial -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

  </body>
</html>