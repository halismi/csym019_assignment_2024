<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $level = $conn->real_escape_string($_POST['level']);
    $duration = $conn->real_escape_string($_POST['duration']);
    $overview = $conn->real_escape_string($_POST['overview']);
    $highlights = $conn->real_escape_string($_POST['highlights']);
    $course_details = $conn->real_escape_string($_POST['course_details']);

    // Process modules and credits
    $modules = $_POST['modules'];
    $credits = $_POST['credits'];
    $module_data = [];
    for ($i = 0; $i < count($modules); $i++) {
        if (!empty($modules[$i]) && !empty($credits[$i])) {
            $module_data[] = [
                'module' => $modules[$i],
                'credits' => (int)$credits[$i]
            ];
        }
    }
    $modules_json = $conn->real_escape_string(json_encode($module_data));

    $entry_requirements = $conn->real_escape_string($_POST['entry_requirements']);
    $fees_and_funding_GBP = $conn->real_escape_string($_POST['fees_and_funding_GBP']);
    $fees_and_funding_EUR = $conn->real_escape_string($_POST['fees_and_funding_EUR']);
    $fees_and_funding_USD = $conn->real_escape_string($_POST['fees_and_funding_USD']);
    $faqs = $conn->real_escape_string($_POST['faqs']);
    $image_url = $conn->real_escape_string($_POST['image_url']);

    $sql = "INSERT INTO courses (course_name, level, duration, overview, highlights, course_details, modules, entry_requirements, fees_and_funding_GBP, fees_and_funding_EUR, fees_and_funding_USD, faqs, image_url)
    VALUES ('$course_name', '$level', '$duration', '$overview', '$highlights', '$course_details', '$modules_json', '$entry_requirements', '$fees_and_funding_GBP', '$fees_and_funding_EUR', '$fees_and_funding_USD', '$faqs', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Course added successfully.</p>";
        echo "<a href='index.php' class='button'>Back to Main Page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href='index.php' class='button'>Back to Main Page</a>";
    }
}

$conn->close();
?>
