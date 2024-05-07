<?php



// 데이터베이스 설정
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "tjrwls0802";
$dbName = "pet";

// 데이터베이스 연결
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// 연결 오류 확인
if ($con->connect_error) {
    die("연결 실패: " . $con->connect_error);
}

// 문자셋 설정
$con->set_charset('utf8mb4');

// POST 메소드로 전송된 데이터를 받습니다.
$username = isset($_POST['username']) ? $con->real_escape_string(trim($_POST['username'])) : null;
$password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
$dog_name = isset($_POST['dog_name']) ? $con->real_escape_string(trim($_POST['dog_name'])) : null;
$dog_breed = isset($_POST['dog_breed']) ? $con->real_escape_string(trim($_POST['dog_breed'])) : null;
$dog_age = isset($_POST['dog_age']) ? intval($_POST['dog_age']) : null;
$dog_weight = isset($_POST['dog_weight']) ? doubleval($_POST['dog_weight']) : null;
$neutered = isset($_POST['neutered']) ? ($_POST['neutered'] === 'yes' ? 1 : 0) : null;
$region = isset($_POST['region']) ? $con->real_escape_string(trim($_POST['region'])) : null;

// 입력값 검증
if ($username === null || $password === null || $dog_age === null || $dog_weight === null || $neutered === null || $region === null) {
    // 필수 입력값 중 하나라도 누락된 경우 사용자에게 알립니다.
    echo "<p>필수 정보를 모두 입력해야 합니다.</p>";
    echo "<a href='register.html'><button>돌아가기</button></a>";
    exit();
}

// SQL 쿼리 준비
$sql = "INSERT INTO usertbl (username, password, dog_name, dog_breed, dog_age, dog_weight, neutered, region) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Prepared statement 준비
$stmt = $con->prepare($sql);
if (!$stmt) {
    die('prepare() failed: ' . htmlspecialchars($con->error));
}

// 변수 바인딩
if (!$stmt->bind_param("ssssiids", $username, $password, $dog_name, $dog_breed, $dog_age, $dog_weight, $neutered, $region)) {
    die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}

// 쿼리 실행
if ($stmt->execute()) {
    echo "<p>회원가입 성공했습니다.</p>";
    echo "<a href='login.html'><button>로그인하러가기</button></a>";
} else {
    echo "<p>데이터 입력 실패: " . htmlspecialchars($stmt->error) . "</p>";
    echo "<a href='register.html'><button>다시 시도하기</button></a>";
}

// 연결 닫기
$stmt->close();
$con->close();
?>