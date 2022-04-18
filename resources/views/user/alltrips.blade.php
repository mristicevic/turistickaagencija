@extends('user.frontend')
@section('content')
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4 style="color:black">new trips</h4>
              <h2 class ="naslov" style="color:black" >TRAVEL PRO</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if(session()->has('message'))
<div class = "alert alert-success">
  <button type = "button" class="close" data-dismiss= "alert">x</button>
  {{session()->get('message')}}
</div>
@endif

<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Choose your perfect trip</h2>
             
            

            <form action="{{url('search')}}" method="get" class="form-inline" style="float:right; padding= 10pxt;"> 
              <input class="form-control" type="search" name="search"  placeholder ="search">
              <input type ="submit" value="Search" class=btn btn-success>
            </form>
          </div>
         </div>
          @foreach($data as $product)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height ="350" width="100" src="/trip/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}} </h4></a>
                <h4>{{$product->category->catagory_name}} </h4>
                <h6>{{$product->price}} €</h6>
                <h7>{{$product->time}} €</h7>
                <p>{{$product->description}}</p>

                
                <add-to-cart trip-id="{{$product->id}}" user-id="{{auth()->user()->id ?? 0}}"/>
                
              </div>
            </div>
          </div>
        @endforeach

       
      </div>
    </div>
@endsection
    
