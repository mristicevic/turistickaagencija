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
              <h2>Latest Trips</h2>
             
            

            
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
                <p>{{$product->time}}</p>

              </div>
            </div>
          </div>
        @endforeach

       
      </div>
    </div>