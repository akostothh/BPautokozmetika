<?php
    session_start() ;
    include("./kapcsolat.php") ;

    $ip = $_SERVER['REMOTE_ADDR'] ;
    $sess = substr( session_id() , 0 , 8 )  ;
    if ( isset($_SESSION['uid']) )  $uid = $_SESSION['uid'] ;
    else                            $uid = 0                ;
    $url = $_SERVER['REQUEST_URI'] ; 

    mysqli_query( $adb , "
    
    INSERT INTO naplo (nid, ndatum, nip, nsession, nuid, nurl) 
    VALUES            (NULL, NOW(), '$ip', '$sess', '$uid', '$url')

    ") ;
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/fevicon.png" type="image/x-icon">
  <title>Autokozmetika BP</title>


  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <div class="hero_bg_box">
      <img src="./images/fokep2.jpg" alt="">
    </div>
    <!-- header section strats -->
   
    <!-- end header section -->
    <!-- slider section -->
    <main>
      <?php 
       include("./header.php");
      if (isset($_GET["o"]))
      {     switch($_GET["o"]){
        case 'kezdolap':
          include("./kezdolap.php");
          break;
            case 'shop':
            include("./shop.php");
            break;
            case 'about':
              include("./about.php");
              break;
              case 'service':
                include("./service.php");
                break;
                case 'team':
                  include("./team.php");
                  break;
                 
        }
       
      }
      else{
        include("./404_belso.php");
      }
      
      include("./footer.php");
      


       ?>
    </main>
      
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
  
</body>

</html>



