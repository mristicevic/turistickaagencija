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
              <h2>Latest Products</h2>
             
            

            <form action="{{url('search')}}" method="get" class="form-inline" style="float:right; padding= 10pxt;"> 
              <input class="form-control" type="search" name="search"  placeholder ="search">
              <input type ="submit" value="Search" class=btn btn-success>
            </form>
          </div>
         </div>
          @foreach($data as $product)
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="/assets/images/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>{{$product->price}}</h6>
                <p>{{$product->description}}</p>

                <form action="{{url('addcart',$product->id)}}" method="POST">
                  @csrf
                  <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity">
                  <br>
                  <input class="btn btn-primary" type ="submit" value="Add cart" style="width:150px">
                </form>

                
              </div>
            </div>
          </div>
        @endforeach

       
      </div>
    </div>