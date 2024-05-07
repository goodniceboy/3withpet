<?php
session_start();
require 'db_connect.php'; // 데이터베이스 연결 설정 파일

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 폼 제출 데이터 받기
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $current_password = $_POST['password']; // 현재 비밀번호
    $dog_name = $_POST['dog_name'];
    $dog_breed = $_POST['dog_breed'];
    $neutered = $_POST['neutered'];
    $region = $_POST['region'];

    // 새 비밀번호와 확인 비밀번호 일치 여부 확인
    if ($new_password !== $confirm_password) {
        $_SESSION['error_message'] = "새 비밀번호와 확인 비밀번호가 일치하지 않습니다.";
        header('Location: user_info_edit.php');
        exit;
    }

    $current_password = $_POST['current_password']; // 현재 비밀번호

    // 현재 로그인한 사용자의 원래 비밀번호를 데이터베이스에서 가져옵니다.
    $stmt = $pdo->prepare("SELECT password FROM usertbl WHERE id = :id");
    $stmt->bindValue(':id', $_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->fetch();


    
    // 현재 비밀번호 검증
    if ($user && password_verify($current_password, $user['password'])) {
        // 'neutered' 값을 정수로 변환
        $neutered_value = ($neutered === 'yes') ? 1 : 0;

        // 새 비밀번호 해싱
        $newPasswordHashed = password_hash($new_password, PASSWORD_DEFAULT);

        // 비밀번호와 다른 정보 업데이트
        $sql = "UPDATE usertbl SET password = :password, dog_name = :dog_name, dog_breed = :dog_breed, neutered = :neutered, region = :region WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':password', $newPasswordHashed);
        $stmt->bindValue(':dog_name', $dog_name);
        $stmt->bindValue(':dog_breed', $dog_breed);
        $stmt->bindValue(':neutered', $neutered_value, PDO::PARAM_INT);
        $stmt->bindValue(':region', $region);
        $stmt->bindValue(':id', $_SESSION['user_id']);
        $stmt->execute();

        // 세션 정보 업데이트
        $_SESSION['dog_name'] = $dog_name;
        $_SESSION['dog_breed'] = $dog_breed;
        $_SESSION['neutered'] = $neutered;
        $_SESSION['region'] = $region;

        // 정보 업데이트 성공 후 메시지 설정
        $_SESSION['update_success'] = "회원 정보가 성공적으로 업데이트되었습니다.";
        header('Location: index.php');
        exit;
    } else {
        // 현재 비밀번호가 틀렸을 경우 에러 메시지 설정
        $_SESSION['error_message'] = "현재 비밀번호가 틀렸습니다.";
        header('Location: user_info_edit.php');
        exit;
    }
} else {
    // POST 메소드가 아닌 경우 처리하지 않음
    header('Location: user_info_edit.php');
    exit;
}
?>