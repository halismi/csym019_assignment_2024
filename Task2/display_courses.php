<?php
include 'db.php';

$sql = "SELECT * FROM courses ORDER BY course_name ASC"; // SQL query για την επιλογή όλων των courses ταξινομημένα με βάση το όνομα του μαθήματος σε αύξουσα σειρά
$result = $conn->query($sql); // Γίνεται execute το query και αποθηκεύεται το αποτέλεσμα. (PHP.net, 2024)

if ($result->num_rows > 0) { //Έλεγχος εάν όντως υπάρχουν αποτελέσματα (PHP.net, 2024)
    while($row = $result->fetch_assoc()) { //Για κάθε row από το παραπάνω αποτέλεσμα γίνεται το αντίστοιχο fetch  σ’ έναν associative πίνακα. 
        $course_id = $row['id'];
        
        // Fetch the modules for the current course
        $module_sql = "SELECT module_name, credits FROM course_modules WHERE course_id = $course_id";
        $module_result = $conn->query($module_sql);
        $modules = [];
        while ($module_row = $module_result->fetch_assoc()) {
            $modules[] = "Module: " . $module_row['module_name'] . ", Credits: " . $module_row['credits'];
        }
        $modules_list = implode('<br>', $modules);
        
        echo "<tr>
            <td><input type='checkbox' name='course_ids[]' value='{$row['id']}'></td>
            <td>
                <form method='POST' action='delete_course.php'>
                    <input type='hidden' name='course_id' value='{$row['id']}'>
                    <button type='submit'>Delete</button>
                </form>
            </td>
            <td>{$row['id']}</td>
            <td>{$row['course_name']}</td>
            <td>{$row['level']}</td>
            <td>{$row['duration']}</td>
            <td>{$row['overview']}</td>
            <td>{$row['highlights']}</td>
            <td>{$row['course_details']}</td>
            <td>{$modules_list}</td>
            <td>{$row['entry_requirements']}</td>
            <td>{$row['fees_and_funding_GBP']}</td>
            <td>{$row['fees_and_funding_EUR']}</td>
            <td>{$row['fees_and_funding_USD']}</td>
            <td>{$row['faqs']}</td>
            <td><img src='{$row['image_url']}' alt='{$row['course_name']}' class='course-image'></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='17'>No courses found</td></tr>"; //Μήνυμα σε περίπτση που δεν βρεθεί κανένα μάθημα.
}

$conn->close();
?>
