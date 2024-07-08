<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of Northampton Courses</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <header>
        <h1>University of Northampton Courses</h1>
    </header>

    <div class="container">
        <div class="form-container">
            <h2>Add New Course</h2>
            <form method="POST" action="form_handler.php" target="_blank">
                <input type="text" id="course_name" name="course_name" placeholder="Course Name" required>
                <input type="text" id="level" name="level" placeholder="Level" required>
                <input type="text" id="duration" name="duration" placeholder="Duration" required>
                <textarea id="overview" name="overview" placeholder="Overview" required></textarea>
                <textarea id="highlights" name="highlights" placeholder="Highlights" required></textarea>
                <textarea id="course_details" name="course_details" placeholder="Course Details" required></textarea>
                <textarea id="entry_requirements" name="entry_requirements" placeholder="Entry Requirements" required></textarea>
                <input type="number" step="1" id="fees_and_funding_GBP" name="fees_and_funding_GBP" placeholder="Fees (GBP)" required>
                <input type="number" step="1" id="fees_and_funding_EUR" name="fees_and_funding_EUR" placeholder="Fees (EUR)" required>
                <input type="number" step="1" id="fees_and_funding_USD" name="fees_and_funding_USD" placeholder="Fees (USD)" required>
                <select id="funding_available" name="funding_available" required>
                    <option value="">Funding Available?</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <input type="text" id="accreditation" name="accreditation" placeholder="Accreditation" required>
                <textarea id="student_perks" name="student_perks" placeholder="Student Perks" required></textarea>
                <textarea id="faqs" name="faqs" placeholder="FAQs" required></textarea>
                <input type="text" id="image_url" name="image_url" placeholder="Image URL" required>
                <button type="submit">Add Course</button>
            </form>
        </div>

        <div class="link-container">
            <h2>Manage Courses</h2>
            <a href="courses.php" class="button">View and Manage Courses</a>
        </div>

    </div>
</body>
</html>
