<?php
/**
 * Connect to database
 */
function db() {
    $host     = 'localhost';
    $database = 'web_a';
    $user     = 'root';
    $password = '';

    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

/**
 * Create a new student record
 */
function createStudent($name, $age, $email, $profile) {
    try {
        $db = db();
        $stmt = $db->prepare("INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':profile', $profile);
        $stmt->execute();
        echo "Student record created successfully";
    } catch(PDOException $e) {
        echo "Error creating student record: " . $e->getMessage();
    }
}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    $db = db();
    $stmt = $db->prepare("SELECT * FROM student");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    $db = db();
    $stmt = $db->prepare("SELECT * FROM student Where id = $id");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $db = db();
    $sql = "DELETE FROM student WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "Xóa Thành Công";
        } else {
            echo "Không tìm thấy học viên để xóa";
        }
    } else {
        echo "Error updating record " . $stmt->errorCode();
    }
}


/**
 * Update students
 * 
 */
function updateStudent($id, $name, $age, $email, $profile) {
    try {
        $db = db(); // Đảm bảo rằng hàm db() đã được định nghĩa trong tệp database.php
        $stmt = $db->prepare("UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':profile', $profile);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // echo "update success";
    } catch(PDOException $e) {
        echo "Error updating student: " . $e->getMessage();
    }
}
