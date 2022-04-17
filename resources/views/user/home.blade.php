<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Travel Pro</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
    <div id="app">
      @include('user.header')
             

    
          <!-- ***** Preloader Start ***** -->
              <div id="preloader">
                  <div class="jumper">
                      <div></div>
                      <div></div>
                      <div></div>
                  </div>
              </div>  
          <!-- ***** Preloader End ***** -->

          <!-- Header -->
    
    
   
          <!-- Page Content -->
          <!-- Banner Starts Here -->
            <div class="banner header-text">
              <div class="owl-banner owl-carousel">
                  <div class="banner-item-01">
                      <div class="text-content">
                        <h4>Traveling agency</h4>
                        <h2>Welcome to Travel Pro</h2>
                      </div>
                  </div>
                  <!-- Banner Ends Here 
                <div class="banner-item-02">
                  <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                  </div>
                </div>-->
              </div>
            </div>
          <!-- Banner Ends Here -->

          @include('user.product')

          <div class="best-features">
            <div class="container">
              <div class="row">
                  <div class="col-md-12">
                    <div class="section-heading">
                      <h2>About Travel Pro agency</h2>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="left-content">
                      <h4> Let's travel together! </h4>
                      <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">Travel Pro </a> Travel Pro is a globally reaching company, led with people first, family values. We are a company where every team member is empowered to lead change and drive vision.

        And with a team of experts who are driven by their passion for travel, be assured — we know how personal travel is. Whatever the reason, wherever the destination – it’s unique for everyone and we are committed to the journey and the experience. So, the only question now is, where to next?
                    
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="right-image">
                      <img src="assets/images/abouttt.jpg" alt="">
                    </div>
                  </div>
              </div>
            </div>
          </div>

 
    </div> 
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
