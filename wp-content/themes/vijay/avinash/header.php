<?php 

wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css',false,'1.1','all');

?>
<!doctype html>
<html>

<head>
<?php wp_head(); ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body >
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="padding-left:16px">
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container style=">
  <h2 style="text-align:center;">V2STORE</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="https://sharpmagazine.com/wp-content/uploads/2016/02/nyfwm-day-1-1600x856.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://sharpmagazine.com/wp-content/uploads/2016/02/joseph-abboud-nyfw-fw16-1600x856.jpg" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="https://i.ytimg.com/vi/dS4ZBATMmvw/maxresdefault.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <h2 style="text-align:center">Categories</h2>
  <div class="row">
    <div class="col-sm-3" >
    <img src="https://i.ytimg.com/vi/dS4ZBATMmvw/maxresdefault.jpg" alt="New york" style="width:100%;" class="img-circle">
    <h3>Shirt/T-Shirts</h3>
    </div>
    <div class="col-sm-3" >
    <img src="https://i.ytimg.com/vi/dS4ZBATMmvw/maxresdefault.jpg" alt="New york" style="width:100%;" class="img-circle">
       <h3 style="text-aling:center">Jeans/Tousers</h3>
    </div>
    <div class="col-sm-3"  >
    <img src="https://i.ytimg.com/vi/dS4ZBATMmvw/maxresdefault.jpg" alt="New york" style="width:100%;" class="img-circle">
         <h3 style="text-aling:center">Shoes</h3>
    </div>
    <div class="col-sm-3" >
    <img src="https://i.ytimg.com/vi/dS4ZBATMmvw/maxresdefault.jpg" alt="New york" style="width:100%;" class="img-circle">
       <h3 style="text-aling:center">Accesories</h3>
    </div>
  </div>
</div>
</div>









<script>

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


</body>
</html>