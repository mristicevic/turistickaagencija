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
        .img_size{
            width: 150px;
            height: 150px;
        }
        .center{
          margin:auto;
          width: 100%;
          text-align:center;
          margin-top: 30px;
          border: 3px solid purple;
          background: #163376;
          font-size: 13px;

        }
        .center tr:first-child td {
          color: Violet;
          font-weight: bold;
          background: purple;
          height: 50px;
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
            <h2 class="h2font">ALL TRIPS</h2>
          
          

          <table class="center">
          <tr>
              <td>CLIENT ID</td>
              <td>CLIENT NAME</td>
              <td>CLIENT ADDRESS</td>
              <td>ORDER DETAILS</td>
              <td>CURRENCY</td>
              <td>AMOUNT</td>
              
            </tr>
            @foreach($data as $data)
            
            <td>{{$data->client_id}}</td>
            <td>{{$data->client_name}}</td>
            <td>{{$data->client_address}}</td>
            <td>{{$data->order_details}}</td>
            <td>{{$data->currency}}</td>
            <td>{{$data->amount}}</td>
           

            
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