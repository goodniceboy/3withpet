<?php
session_start();
require 'db_connect.php'; // 데이터베이스 연결 설정 파일

// 사용자 입력 받기
$username = $_POST['username'] ?? ''; // PHP 7.0 이상에서 사용 가능한 Null 병합 연산자
$password = $_POST['password'] ?? '';

// 입력 값 유효성 검사
if (empty($username) || empty($password)) {
    // 입력 값이 비어 있으면 로그인 실패 페이지로 리디렉션
    $_SESSION['error'] = '아이디와 비밀번호를 입력해주세요.';
    header("Location: login_fail.php");
    exit;
}

// 데이터베이스 쿼리 준비
$sql = "SELECT id, password, dog_name, dog_breed, neutered, region FROM usertbl WHERE username = :username";
$stmt = $pdo->prepare($sql);

// 변수 바인딩
$stmt->bindValue(':username', $username);

// 쿼리 실행
$stmt->execute();

// 결과 가져오기
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    // 로그인 성공
    $_SESSION['loggedin'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $username;
    $_SESSION['dog_name'] = $user['dog_name']; // 강아지 이름
    $_SESSION['dog_breed'] = $user['dog_breed']; // 강아지 종
    $_SESSION['neutered'] = $user['neutered']; // 중성화 여부
    $_SESSION['region'] = $user['region']; // 

    header("Location: index.php");
    exit;
} else {
    // 로그인 실패
    $_SESSION['error'] = "로그인 실패!";
    header("Location: login_fail.php"); // 로그인 실패 페이지로 리디렉션
    exit;
}
?>