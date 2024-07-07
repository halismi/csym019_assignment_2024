<?php
include 'db.php';

    $course_id = $_POST['course_id'];

    $sql = "DELETE FROM courses WHERE id='$course_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Course deleted succesfully!";
      
    } else {
        echo "Error deleting course: " . $conn->error; }
$conn->close();
?>
