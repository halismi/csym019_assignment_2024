<?php
$servername = "localhost"; // Server name ή  IP address το localhost υποδηλώνει ότι η σύνδεση θα γίνε με τον τοπικό sever/machine (W3Schools, 2024)
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "mydb"; // Database name
// Δημιουργία σύνδεσης με την MySQL db με την χρήση των παραπάνω στοιχείων (PHP.net, 2024)
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {//έλεγχος εάν η σύνδεση απέτυχε
    die("Connection failed: " . $conn->connect_error); //τερματισμός της σύνδεσης και εμφάνιση του αντίστοιχου σφάλματος (PHP.net, 2024)
} 
?>

