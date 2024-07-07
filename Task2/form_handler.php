<?php
include 'db.php';

    $course_name = $_POST['course_name'];
    $level = $_POST['level'];
    $duration = $_POST['duration'];
    $overview = $_POST['overview'];
    $highlights = $_POST['highlights'];
    $course_details = $_POST['course_details'];
    $entry_requirements = $_POST['entry_requirements'];
    $fees_and_funding_GBP = $_POST['fees_and_funding_GBP'];
    $fees_and_funding_EUR = $_POST['fees_and_funding_EUR'];
    $fees_and_funding_USD = $_POST['fees_and_funding_USD'];
    $funding_available = $_POST['funding_available'];
    $accreditation = $_POST['accreditation'];
    $student_perks = $_POST['student_perks'];
    $faqs = $_POST['faqs'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO courses (course_name, level, duration, overview, highlights, course_details, entry_requirements, fees_and_funding_GBP, fees_and_funding_EUR, fees_and_funding_USD, funding_available, accreditation, student_perks, faqs, image_url)
    VALUES ('$course_name', '$level', '$duration', '$overview', '$highlights', '$course_details', '$entry_requirements', '$fees_and_funding_GBP', '$fees_and_funding_EUR', '$fees_and_funding_USD', '$funding_available', '$accreditation', '$student_perks', '$faqs', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "Course added succesfully!";
        exit();
    } else {
        echo "Error deleting course: " . $conn->error; }
    
$conn->close();
?>
