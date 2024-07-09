<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = intval($_POST['course_id']);

    $sql = "DELETE FROM courses WHERE id = $course_id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Course deleted successfully.</p>";
        echo "<a href='courses.php' class='button'>Back to Courses</a>";
    } else {
        echo "Error deleting record: " . $conn->error;
        echo "<a href='courses.php' class='button'>Back to Courses</a>";
    }
}

$conn->close();
?>
