<?php
include 'db.php';

$sql = "SELECT * FROM courses ORDER BY course_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
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
            <td>{$row['modules']}</td>
            <td>{$row['credits']}</td>
            <td>{$row['entry_requirements']}</td>
            <td>{$row['fees_and_funding_GBP']}</td>
            <td>{$row['fees_and_funding_EUR']}</td>
            <td>{$row['fees_and_funding_USD']}</td>
            <td>{$row['faqs']}</td>
            <td><img src='{$row['image_url']}' alt='{$row['course_name']}' width='100'></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='17'>No courses found</td></tr>";
}

$conn->close();
?>
