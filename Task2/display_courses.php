<?php
include 'db.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>
                <form method='POST' action='delete_course.php'>
               <input type='hidden' name='course_id' value='{$row['id']}'>
                    <button type='submit'>Delete</button>
                </form>
            </td>
            <td><input type='checkbox'></td>
            <td>{$row['id']}</td>
            <td>{$row['course_name']}</td>
            <td>{$row['level']}</td>
            <td>{$row['duration']}</td>
            <td>{$row['overview']}</td>
            <td>{$row['highlights']}</td>
            <td>{$row['course_details']}</td>
            <td>{$row['entry_requirements']}</td>
            <td>{$row['fees_and_funding_GBP']}</td>
            <td>{$row['fees_and_funding_EUR']}</td>
            <td>{$row['fees_and_funding_USD']}</td>
            <td>{$row['funding_available']}</td>
            <td>{$row['accreditation']}</td>
            <td>{$row['student_perks']}</td>
            <td>{$row['faqs']}</td>
            <td><img src='{$row['image_url']}' alt='{$row['course_name']}' width='150'></td>
        </tr>";
    }
} else {
    echo "<tr>No courses found</td></tr>";
}

$conn->close();
?>
