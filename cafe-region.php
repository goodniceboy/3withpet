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
        <!--welcome-hero start -->
      <section id="home" class="slider_section">
         <div class="container">
            <div class="welcome-hero-txt">
            </div>
            <div class="welcome-hero-serch-box">
              <form action="cafename-search.php" method="get" class="welcome-hero-form">
                  <div class="single-welcome-hero-form">
                      <img src="images/search-icon.png" alt="돋보기" width="25" height="25">
                      <input type="text" name="query" placeholder="반려동물과 함께 가고싶은 곳을 검색해 보세요">
                      <button type="submit" class="welcome-hero-btn">
                        search <i data-feather="search"></i>
                  </div>
              </form>
            
            </button>
          </div>
          
           
      </section><!--/.welcome-hero-->
      <!--welcome-hero end -->
    </div>
    <!-- end header section -->
    <!--list-topics start -->
    <section id="list-topics" class="list-topics">
        <div class="container">
            <div class="list-topics-content">
                <ul>
                    <li>
                        <div class="single-list-topics-content">
                          <a href="seoul-cafe-search.php">                          
                            <img class="region-image" src="images/seoul.png" alt="dd">
                          </a>
                            <h4>서울</h4>                          
                        </div>
                    </li>
                    <li>
                      <div class="single-list-topics-content">
                        <a href="incheon-cafe-search.php">
                          <img class="region-image" src="images/incheon.png" alt="dd">
                        </a>
                          <h4>인천</h4>
                      </div>
                    </li>
                    <li>
                        <div class="single-list-topics-content">
                          <a href="gyunggi-cafe-search.php">                          
                            <img class="region-image" src="images/landmark.png" alt="dd">
                          </a>
                            <h4>경기</h4>
                        </div>
                    </li>
                    <li>
                        <div class="single-list-topics-content"> 
                          <a href="gangwon-cafe-search.php">                          
                            <img class="region-image" src="images/landmark2.png" alt="dd">
                          </a>
                            <h4>강원</h4>
                        </div>
                    </li>
                    <li>
                      <div class="single-list-topics-content">
                        <a href="daejeon-cafe-search.php">         
                          <img class="region-image" src="images/daegeon.png" alt="dd">
                        </a>
                          <h4>대전</h4>
                      </div>
                  </li>
                    <li>
                        <div class="single-list-topics-content">
                          <a href="chungcheong-cafe-search.php">         
                            <img class="region-image" src="images/landmark3.png" alt="dd">
                          </a>
                            <h4>충청</h4>
                        </div>
                    </li>
                    <li>
                      <div class="single-list-topics-content">
                        <a href="busan-cafe-search.php">                           
                          <img class="region-image" src="images/busan.png" alt="dd">
                        </a> 
                          <h4>부산</h4>
                      </div>
                  </li>
                    <li>
                      <div class="single-list-topics-content">
                        <a href="daegu-cafe-search.php">                         
                          <img class="region-image" src="images/daegu.png" alt="dd">
                        </a>
                          <h4>대구</h4>
                      </div>
                  </li>
                    <li>
                        <div class="single-list-topics-content">
                          <a href="gyungsang-cafe-search.php">                         
                            <img class="region-image" src="images/landmark5.png" alt="dd">
                          </a>
                            <h4>경상</h4>
                        </div>
                    </li>
                    <li>
                      <div class="single-list-topics-content"> 
                        <a href="gwangju-cafe-search.php">                          
                          <img class="region-image" src="images/guangju.png" alt="dd">
                        </a>
                          <h4>광주</h4>
                      </div>
                  </li>
                    <li>
                        <div class="single-list-topics-content"> 
                          <a href="jeonra-cafe-search.php">                          
                            <img class="region-image" src="images/landmark4.png" alt="dd">
                          </a>
                            <h4>전라</h4>
                        </div>
                    </li>
                    <li>
                        <div class="single-list-topics-content">    
                          <a href="jeju-cafe-search.php">                       
                            <img class="region-image" src="images/jeju.png" alt="dd">
                          </a>
                            <h4>제주</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!--/.container-->

    </section><!--/.list-topics-->
    <!--list-topics end-->

</body>