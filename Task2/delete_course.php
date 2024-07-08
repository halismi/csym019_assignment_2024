<?php
include 'db.php';

    $course_id = $_POST['course_id'];

    $sql = "DELETE FROM courses WHERE id='$course_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Course deleted succesfully!";
        echo "<a href='index.php' class='button'>Back to Main Page</a>";
      
    } else {
        echo "Error deleting course: " . $conn->error; }
        echo "<a href='index.php' class='button'>Back to Main Page</a>";
$conn->close();
?>
