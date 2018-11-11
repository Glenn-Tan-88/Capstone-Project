<?php
include 'includes/header.php';
?>
<!-- !PAGE CONTENT! -->
<!DOCTYPE html>
<html>

<head>
    <title>ABC Jobs Pte Ltd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<br>
<div class="container" style="height:500px">
        <div class="row">
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
                        <img src="images/01.jpg" class="img-responsive" width="1500" height="500">
                    </div>

                    <div class="item">
                        <img src="images/02.jpg" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="images/03.jpg" style="width:100%;">
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
        </div>
    <br>
   
           <div class="container-fluid" style="padding-bottom: 80px">
               <div class="row">
                   <div class="col-sm-3" style="background-color:lightgray; margin:10px 45px 10px 45px; text-align: center">
                       <h3><strong>Our Mission</strong></h3>
                       <img src="images/our_mission.jpg" alt="Who We Are" width="100%"><span style="font-size:18px"><br>
                      <br>The mission of ABC Jobs Pte Ltd is simple.  We connect the world's professionals to make them more productive and successful.<br><br></span>
                   </div>
   
                   <div class="col-sm-3" style="background-color:lightgray; margin:10px 45px 10px 45px; text-align: center">
                       <h3><strong>Who We Are</strong></h3>
                       <img src="images/who_we_are.jpg" alt="What We Do" width="100%"><span style="font-size:18px"><br>
                      <br>ABC Jobs Pte Ltd leads a diversified business with revenues from membership subscriptions, advertising sales and recruitment solutions.<br><br></span>
                   </div>
   
                   <div class="col-sm-3" style="background-color:lightgray; margin:10px 45px 10px 45px; text-align: center">
                       <h3><strong>What We Do</strong></h3>
                       <img src="images/what_we_do.jpg" alt="What We Do" width="100%"><span style="font-size:18px"><br>
                      <br>ABC Jobs Pte Ltd brings together the world's leading professional cloud and the world's leading professional network.<br><br></span>
                   </div>
            </div>
            </div>
    </div>
</body>
</html>


<?php
include 'includes/footer.php';
?>
