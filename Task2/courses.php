<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <header>
        <h1>Courses</h1>
    </header>

    <div class="container">
        <div class="link-container">
            <a href="index.php" class="button">Back to Main Page</a>
        </div>

        <div class="table-container">
            <h2>Courses</h2>
            <form method="POST" action="generate_report.php">
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1"></th>
                            <th>Action</th>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Level</th>
                            <th>Duration</th>
                            <th>Overview</th>
                            <th>Highlights</th>
                            <th>Course Content - Details</th>
                            <th>Course Content - Modules</th>
                            <th>Credits</th>
                            <th>Entry Requirements</th>
                            <th>Fees (GBP)</th>
                            <th>Fees (EUR)</th>
                            <th>Fees (USD)</th>
                            <th>FAQs</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody id="course-table-body">
                        <?php include 'display_courses.php'; ?>
                    </tbody>
                </table>
                <button type="submit">Generate Report</button>
            </form>
        </div>
    </div>
</body>
</html>
