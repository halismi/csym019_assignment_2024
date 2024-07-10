<?php
include 'db.php'; // Συμπεριλαμβάνουμε το db.php script για να επιτύχουμε την σύνδεση στην MySQL Database (W3Schools, 2024)

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Βλέπουμε εάν το request είναι POST κατι που υποδηλώνει ότι η φόρμα έχει γίνει submitted. 
    $course_id = intval($_POST['course_id']); // Ανακτά το course ID από την μέθοδο POST και το μετατρέπει σε ακέραιο αριθμό για λόγους ασφαλείας. (PHP.net, 2024)
    
    // Delete the course modules first due to foreign key constraint
    $module_sql = "DELETE FROM course_modules WHERE course_id = $course_id";
    $conn->query($module_sql);
    // Now delete the course
    $sql = "DELETE FROM courses WHERE id = $course_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Course deleted successfully.</p>"; //Γίνεται έλεγχος εάν το prepared statement ολοκληρώθηκε και εμφανίζεται το μήνυμα ότι η διαγραφή ήταν επιτυχής 
        echo "<a href='courses.php' class='button'>Back to Courses</a>"; //Button για επιστροφή στην αρχική σελίδα
    } else {
        echo "Error deleting record: " . $stmt->error; // Εάν η διαγραφή αποτύχει έχουμε το αντίστοιχο error message (PHP.net, 2024)
        echo "<a href='courses.php' class='button'>Back to Courses</a>";
    }

    $conn->close();
}
?>
