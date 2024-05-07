<?php
// session을 시작합니다.
session_start();

// 만약 사용자가 로그인되어 있지 않다면 로그인 페이지로 리디렉션합니다.
if (!isset($_SESSION['user_id'])) {
    header("Location: LOGIN.html"); // 로그인 페이지의 URL로 수정하세요.
    exit;
}

// 데이터베이스 연결 정보를 설정합니다.
$host = "localhost";
$username = "root";
$password = "tjrwls0802";
$dbname = "withpet";

// MySQL 데이터베이스 연결
$conn = new mysqli($host, $username, $password, $dbname);

// 연결을 확인합니다.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 세션에서 사용자 ID를 가져옵니다.
$user_id = $_SESSION['user_id'];

// SQL 쿼리를 준비합니다.
$sql = "SELECT r.*
        FROM `withpet`.`ratings` AS r
        JOIN (
            SELECT other.id
            FROM `pet`.`usertbl` AS other
            WHERE EXISTS (
                SELECT 1
                FROM `pet`.`usertbl` AS usr
                WHERE usr.id = ?
                  AND other.dog_breed LIKE CONCAT('%', usr.dog_breed, '%')
                  AND other.region LIKE CONCAT('%', usr.region, '%')
                  AND other.dog_age BETWEEN usr.dog_age - 3 AND usr.dog_age + 3
                  AND other.id != usr.id
            )
        ) AS matched_users ON r.user_id = matched_users.id";

// 쿼리를 준비합니다.
$stmt = $conn->prepare($sql);

// 사용자 ID를 바인딩합니다.
$stmt->bind_param("i", $user_id);

// 쿼리를 실행합니다.
$stmt->execute();

// 결과를 가져옵니다.
$result = $stmt->get_result();

// 결과를 처리합니다.
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // 결과를 출력하거나 처리합니다.
        // 여기서는 결과를 그대로 출력합니다.
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
} else {
    echo "No results found";
}

// 연결을 닫습니다.
$stmt->close();
$conn->close();
?>
