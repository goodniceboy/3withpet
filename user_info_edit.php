<header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container justify-content-center">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="" style="height: 80px;"> <!-- 로고 이미지 크기 조정 -->
                    <span style="font-size: 24px; font-weight: bold; margin-left: 10px;">
                        WITH PET
                    </span>
                </a>
            </nav>
        </div>
    </header>




    <?php
    session_start();

    // 사용자가 로그인하지 않았으면 로그인 페이지로 리디렉션
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login.php');
        exit;
    }

    require 'db_connect.php'; // 데이터베이스 연결

    // 폼에서 데이터를 받기 위한 초기화
    $dog_breed = $neutered = $region = '';

    // 데이터베이스에서 현재 사용자 정보를 가져옵니다.
    if(isset($_SESSION['user_id'])) {
        $stmt = $pdo->prepare("SELECT dog_breed, neutered, region FROM usertbl WHERE id = :id");
        $stmt->bindValue(':id', $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($result) {
            // 기존 정보로 폼을 초기화합니다.
            $dog_breed = $result['dog_breed'];
            $neutered = $result['neutered'];
            $region = $result['region'];
        }
    }


    if (isset($_SESSION['error_message'])) {
        echo '<p style="color: red;">' . htmlspecialchars($_SESSION['error_message']) . '</p>';
        unset($_SESSION['error_message']); // 출력 후 에러 메시지 세션 변수 삭제
    }



    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>회원정보수정</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 20px;
            }
            .custom-form-container {
                max-width: 600px;
                margin: auto;
                padding: 20px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .custom-form-header {
                margin-bottom: 20px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="custom-form-container">
            <div class="custom-form-header">
        <h2>회원정보 수정</h2>
        <form action="user_info_update.php" method="post">
        <div>
                <label>아이디(수정 불가):</label>
                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
            <div>
                <label for="new_password">새 비밀번호:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div>
                <label for="confirm_password">새 비밀번호 확인:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div>
                <label for="dog_name">강아지 이름:</label>
                <input type="text" name="dog_name" value="" required>
            </div>
            <div>
                <label for="dog_breed">강아지 종류:</label>
                <input type="text" name="dog_breed" value="<?php echo htmlspecialchars($dog_breed); ?>">
            </div>
            <div>
                <label for="neutered">중성화 여부:</label>
                <select name="neutered">
                    <option value="yes" <?php echo $neutered === 'yes' ? 'selected' : ''; ?>>예</option>
                    <option value="no" <?php echo $neutered === 'no' ? 'selected' : ''; ?>>아니오</option>
                </select>
            </div>
            <div>
                <label for="region">지역:</label>
                <input type="text" name="region" value="<?php echo htmlspecialchars($region); ?>">
            </div>
        <div>
                <label for="current_password">현재 비밀번호:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            
            <button type="submit" class="btn btn-custom">정보 수정</button>
            
            
        </form>
    </body>
    </html>



    <?php if(isset($_SESSION['error_message'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error_message']; ?></p>
        <?php unset($_SESSION['error_message']); // 메시지 출력 후 세션에서 제거 ?>
    <?php endif; ?>
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

    <title>Login - Petology</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    </head>
