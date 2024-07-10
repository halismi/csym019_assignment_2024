<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Έλεγχος εάν η φόρμα έγινε submit με μέθοδο POST 
//Χρησιμοποιούμε το real_escape_string για να κάνουμε sanitize τα input data ώστε να αποφύγουμε SQL injection attacks (Manual, 2024)
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

    // SQL Query για την εισαγωγή όλων των courses στοιχείων στον αντίστοιχο courses πίνακα
    $sql = "INSERT INTO courses (course_name, level, duration, overview, highlights, course_details, entry_requirements, fees_and_funding_GBP, fees_and_funding_EUR, fees_and_funding_USD, faqs, image_url) 
            VALUES ('$course_name', '$level', '$duration', '$overview', '$highlights', '$course_details', '$entry_requirements', $fees_and_funding_GBP, $fees_and_funding_EUR, $fees_and_funding_USD, '$faqs', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        $course_id = $conn->insert_id; // λαμβάνουμε το id από το τελευταίο εισηγμένο course. (Documentation, 2024)

//Λαμβάνουμε τα module και τα credits από τα POST data
        $modules = $_POST['modules']; 
        $credits = $_POST['credits'];
        
//Για κάθε module κάνουμε sanitize τα module name και credits.  (Manual, 2024)
 foreach ($modules as $index => $module) {
            $module_name = $conn->real_escape_string($module);
            $credit = $conn->real_escape_string($credits[$index]);
//SQL query για την τοποθέτηση των Module data στο courses_modules πίνακα
            $module_sql = "INSERT INTO course_modules (course_id, module_name, credits) VALUES ('$course_id', '$module_name', '$credit')";
            $conn->query($module_sql); //Εκτελούμε το query (Documentation, 2024)
        }

        echo "New course added successfully.";
        echo "<a href='index.php' class='button'>Back to Main Page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href='index.php' class='button'>Back to Main Page</a>";
    }
}

$conn->close();
?>
