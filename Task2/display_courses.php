<?php
include 'db.php';

$sql = "SELECT * FROM courses ORDER BY course_name ASC"; // SQL query για την επιλογή όλων των courses ταξινομημένα με βάση το όνομα του μαθήματος σε αύξουσα σειρά
$result = $conn->query($sql); // Γίνεται execute το query και αποθηκεύεται το αποτέλεσμα. (Documentation, 2024)

if ($result->num_rows > 0) { //Έλεγχος εάν όντως υπάρχουν αποτελέσματα από το παραπάνω query (Documentation, 2024)

    while($row = $result->fetch_assoc()) { //Για κάθε row από το παραπάνω αποτέλεσμα γίνεται το αντίστοιχο fetch  σ’ έναν associative πίνακα.
$course_id = $row['id']; //Αποθηκεύομε το course ID για το συγκεκριμένο row 
       
        $module_sql = "SELECT module_name, credits FROM course_modules WHERE course_id = $course_id"; //SQL query όπου επιλέγουμε τα module names και τα credits για το συγκεκριμένο course. (W3Schools, 2024)

        $module_result = $conn->query($module_sql); //Γίνεται execute το query και αποθηκεύουμε το αποτέλεσμα.

        $modules = []; //Δημιουργία πίνακα για να αποθηκεύσουμε τι πληροφορίες του module.

        while ($module_row = $module_result->fetch_assoc()) {
            $modules[] = "Module: " . $module_row['module_name'] . ", Credits: " . $module_row['credits'];  //Τροφοδοτούμε τον πίνακα modules με τις πληροφορίες του module (name/credits)
        }
        $modules_list = implode('<br>', $modules); // Με την function implode κάνουμε join τα elements του πίνακα και τα επιστρέφουμε σ’ ένα string διαχωρίζοντας τα με ένα break row  tag (W3Schools, 2024)

//Παρακάτω έχουμε τα αποτελέσματα σε HTML του κάθε row από τον πίνακα για το κάθε course ξεχωριστά και βάζουμε checkbox δίπλα σε κάθε μάθημα ξεχωριστά και 
// Δημιουργία φόρμας για να μπορούμε να διαγράψουμε το μάθημα με βάση το course id (W3Schools, 2024)
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
        //Προσθήκη image για το course μαζί με την κλάση course-image που θα την χρησιμοποιήσουμε στο css για το styling 
    }
} else {
    echo "<tr><td No courses found</td></tr>"; //Μήνυμα σε περίπτωση που δεν βρεθεί κανένα μάθημα. 
}

$conn->close();
?>
