<?php
// Include the database connection file
include 'db.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $level = $conn->real_escape_string($_POST['level']);
    $duration = $conn->real_escape_string($_POST['duration']);
    $overview = $conn->real_escape_string($_POST['overview']);
    $highlights = $conn->real_escape_string($_POST['highlights']);
    $course_details = $conn->real_escape_string($_POST['course_details']);
    $entry_requirements = $conn->real_escape_string($_POST['entry_requirements']);
    $fees_and_funding_GBP = floatval($_POST['fees_and_funding_GBP']);
    $fees_and_funding_EUR = floatval($_POST['fees_and_funding_EUR']);
    $fees_and_funding_USD = floatval($_POST['fees_and_funding_USD']);
    $faqs = $conn->real_escape_string($_POST['faqs']);
    $image_url = $conn->real_escape_string($_POST['image_url']);

    // Insert the course data into the courses table
    $sql = "INSERT INTO courses (course_name, level, duration, overview, highlights, course_details, entry_requirements, fees_and_funding_GBP, fees_and_funding_EUR, fees_and_funding_USD, faqs, image_url) 
            VALUES ('$course_name', '$level', '$duration', '$overview', '$highlights', '$course_details', '$entry_requirements', $fees_and_funding_GBP, $fees_and_funding_EUR, $fees_and_funding_USD, '$faqs', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        $course_id = $conn->insert_id; // Get the ID of the inserted course
        
        // Prepare the SQL statement to insert modules
        $stmt = $conn->prepare("INSERT INTO course_modules (course_id, module_name, credits) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $course_id, $module_name, $credits);

        // Process modules data
        for ($i = 0; $i < count($_POST['modules']); $i++) {
            $module_name = $conn->real_escape_string($_POST['modules'][$i]);
            $credits = intval($_POST['credits'][$i]);
            $stmt->execute();
        }

        $stmt->close();
        echo "<p>New course and modules created successfully</p>";
        echo "<a href='index.php' class='button'>Back to Main Page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
