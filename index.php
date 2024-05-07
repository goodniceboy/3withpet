<?php session_start(); 
if (isset($_SESSION['update_success'])) {
    echo '<p style="color: green;">' . htmlspecialchars($_SESSION['update_success']) . '</p>';
    unset($_SESSION['update_success']); // 출력 후 성공 메시지 세션 변수 삭제
}
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
  <meta name="author" content="" /><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

  <title>Petology</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min
    " />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
<div class="hero_area">
  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <img src="images/doglogo1.png" alt="">
          <span>
              WITH PET
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cafe-region.php">CAFE </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="haspital-region.php">HOSPITAL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop-region.php">SHOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service-region.php">SERVICE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="culture-region.php">CULTURE</a>
              </li>
              

            </ul>
            <div class="ml-auto"> <!-- ml-auto 클래스를 사용하여 오른쪽 정렬 -->
              <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
      <!-- 로그인한 사용자에게 보이는 내용 -->
      <span class="navbar-text">
        <?php 
        // 강아지 이름이 설정되어 있을 경우 환영 메시지에 포함
        if(isset($_SESSION['dog_name'])) {
            echo htmlspecialchars($_SESSION['dog_name']) . "님 환영합니다.";
        } else {
            // 강아지 이름이 설정되지 않았을 경우 기본 메시지
            echo "환영합니다.";
        }
        ?>
      </span>
      <a href="logout.php" class="btn btn-outline-success my-2 my-sm-0 ml-2" type="button">로그아웃</a>
      <a href="user_info_edit.php" class="btn btn-outline-secondary btn-custom my-2 my-sm-0 ml-2">회원정보수정</a>
      <a href="suggest.php" class="btn btn-outline-secondary btn-custom my-2 my-sm-0 ml-2">추천 서비스</a>
  
  
              <?php else: ?>
              
                  <!-- 로그인하지 않은 사용자에게 보이는 내용 -->
                  <a href="LOGIN.html" class="btn btn-outline-success my-2 my-sm-0" type="button">로그인</a>
              <?php endif; ?>
          </div>
      </div>
      <div class="quote_btn-container d-flex justify-content-center mt-3 mt-lg-0">
          <a href="tel:+8201082655717">
              Call: +82 01082655717
          </a>
      </div>
  </div>


  
      </nav>
    </div>
  </header>
  <!-- end header section -->
  <!-- slider section -->
  <section class="slider_section position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 offset-md-2">
                <div class="slider_detail-box">
                  <h1><span>WITH PET</span></h1>
                  <p style="color: black; font-size: 20px;"><span>WITH PET 과 함께하는<br>애견 생활 가이드 !</span></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="slider_img-box">
                  <img src="images/doglogo1.png" alt="" style="width: 500px; height: 400px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 offset-md-2">
                <div class="slider_detail-box">
                  <h1><span>스마트한 여행 </span> 플래너</h1>
                  <p style="color: black; font-size: 20px;"><span>쉽고 빠르게 애완동물과 여행하세요!</span></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="slider_img-box">
                  <img src="images/강아지여행.jpg" alt="" style="width: 500px; height: 400px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 offset-md-2">
                <div class="slider_detail-box">
                  <h1>전국 모든<span> 애완동물시설 총집합</span></h1>
                  <p style="color: black; font-size: 20px;"><span>미용부터 병원 그리고 먹거리까지 ~!</span></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="slider_img-box">
                  <img src="images/slider-img.png" alt="" style="width: 500px; height: 400px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 offset-md-2">
                <div class="slider_detail-box">
                  <h1>가기 전에<span>리뷰도 확인!!</span></h1>
                  <p></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="slider_img-box">
                  <img src="images/리뷰1.jpg" alt="" style="width: 500x; height: 400px;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- end slider section -->
</div>

<!-- about section -->



<!-- service section -->


<!-- end service section -->



<!-- gallery section -->
<section class="gallery-section layout_padding" style="background-color: white;">
  <div class="container">
    <h2>
      Our Gallery
    </h2>
  </div>
  <div class="container ">
    <div class="img_box box-1">
      <img src="images/송이1.jpg" alt="">
    </div>
    <div class="img_box box-2">
      <img src="images/g-2.png" alt="">
    </div>
    <div class="img_box box-3">
      <img src="images/g-3.png" alt="">
    </div>
    <div class="img_box box-4">
      <img src="images/송이2.jpg" alt="">
    </div>
    <div class="img_box box-5">
      <img src="images/g-5.png" alt="">
    </div>
  </div>
</section>




<!-- end gallery section -->

<!-- buy section -->



<!-- end buy section -->

<!-- client section -->

<!-- end client section -->

<!-- map section -->




<!-- end map section -->

<!-- info section -->
<section class="info_section layout_padding2">
  <div class="container">
    <div class="info_items">
      <a href="">
        <div class="item ">
          <div class="img-box box-1">
            <img src="" alt="">
          </div>
          <div class="detail-box">
            <p>
              cbnu
            </p>
          </div>
        </div>
      </a>
      <a href="">
        <div class="item ">
          <div class="img-box box-2">
            <img src="" alt="">
          </div>
          <div class="detail-box">
            <p>
              +02 1234567890
            </p>
          </div>
        </div>
      </a>
      <a href="">
        <div class="item ">
          <div class="img-box box-3">
            <img src="" alt="">
          </div>
          <div class="detail-box">
            <p>
              withpet@cbnu.ac.kr
            </p>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- end info_section -->

<!-- 로그인 섹션 -->

<!-- 로그인 섹션 끝 -->




<!-- footer section -->

<!-- footer section -->

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<script>
  // This example adds a marker to indicate the position of Bondi Beach in Sydney,
  // Australia.
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: {
        lat: 40.645037,
        lng: -73.880224
      },
    });

    var image = 'images/maps-and-flags.png';
    var beachMarker = new google.maps.Marker({
      position: {
        lat: 40.645037,
        lng: -73.880224
      },
      map: map,
      icon: image
    });
  }
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
</script>
<!-- end google map js -->
</body>
</body>

</html>