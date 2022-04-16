
<!DOCTYPE html>
<html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

            <title>Travel Pro</title>
            <script src="{{asset('css/app.css')}}" defer></script>

            <!-- Bootstrap core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <!--TemplateMo 546 Sixteen Clothing https://templatemo.com/tm-546-sixteen-clothing-->

            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="assets/css/fontawesome.css">
            <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
            <link rel="stylesheet" href="assets/css/owl.css">

        </head>

        <body>
  
            <!-- ***** Preloader End ***** -->
            @include('user.header')
            <div id="app">
                <div id="preloader">
                    <div class="jumper">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>  
                @yield('content')

            </div>  

    
            <!-- Bootstrap core JavaScript -->
            <script  src="vendor/jquery/jquery.min.js"></script>
            <script  src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            
            <script  src="{{ asset('js/app.js') }}" defer></script>


            <!-- Additional Scripts -->
            <script  src="assets/js/custom.js"></script>
            <script  src="assets/js/owl.js"></script>
            <script  src="assets/js/slick.js"></script>
            <script  src="assets/js/isotope.js"></script>
            <script  src="assets/js/accordions.js"></script>


            <script  language = "text/Javascript"> 
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
    
