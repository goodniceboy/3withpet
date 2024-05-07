import mysql.connector
import json

# 데이터베이스 연결 설정
db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="tjrwls0802",  # 보안을 위해 실제 코드에는 비밀번호를 하드코딩하지 마세요.
    database="withpet"
)

cursor = db.cursor()

# 로그인된 사용자의 ID를 어딘가에서 가져옵니다.
def get_logged_in_user_id():
    # 이 함수는 현재 로그인한 사용자의 ID를 반환해야 합니다.
    # 예시 ID 반환
    return 1  # 실제 어플리케이션에서는 이 부분을 적절히 조정해야 합니다.

logged_in_user_id = get_logged_in_user_id()

# SQL 쿼리 실행
cursor.execute("""
SELECT r.*
FROM `withpet`.`ratings` AS r
JOIN (
    SELECT other.id
    FROM `pet`.`usertbl` AS other
    WHERE EXISTS (
        SELECT 1
        FROM `pet`.`usertbl` AS usr
        WHERE usr.id = %s
          AND other.dog_breed LIKE CONCAT('%%', usr.dog_breed, '%%')
          AND other.region LIKE CONCAT('%%', usr.region, '%%')
          AND other.dog_age BETWEEN usr.dog_age - 3 AND usr.dog_age + 3
          AND other.id != usr.id
    )
) AS matched_users ON r.user_id = matched_users.id;
""", (logged_in_user_id,))

results = cursor.fetchall()

# 결과를 JSON 파일에 저장
with open('results.json', 'w') as f:
    # cursor.description를 사용하여 컬럼 이름과 결과를 함께 저장
    columns = [column[0] for column in cursor.description]
    result_dicts = [dict(zip(columns, row)) for row in results]
    json.dump(result_dicts, f, indent=4)  # JSON 파일 포맷팅을 위해 indent 사용

# 연결 종료
cursor.close()
db.close()
