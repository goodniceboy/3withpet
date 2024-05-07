<?php
$conn = new mysqli("localhost", "root", "tjrwls0802", "withpet");

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL 쿼리 실행
$sql = "SELECT r.* FROM `withpet`.`ratings` AS r JOIN (SELECT other.id FROM `pet`.`usertbl` AS other WHERE EXISTS (SELECT 1 FROM `pet`.`usertbl` AS usr WHERE usr.id = {$_SESSION['user_id']} AND other.dog_breed LIKE CONCAT('%%', usr.dog_breed, '%%') AND other.region LIKE CONCAT('%%', usr.region, '%%') AND other.dog_age BETWEEN usr.dog_age - 3 AND usr.dog_age + 3 AND other.id != usr.id)) AS matched_users ON r.user_id = matched_users.id;";
$result = $conn->query($sql);

// 결과 출력
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>User ID: " . $row["user_id"] . ", Rating: " . $row["rating"] . "</p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
