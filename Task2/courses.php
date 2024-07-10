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
        <div class="link-container"> <!--Θέτουμε ένα container div για το navigation link -->
            <a href="index.php" class="button">Back to Main Page</a> <!--Εισαγωγή button το οποίο μας οδηγεί στο index.php (αρχική σελίδα)-->
        </div>

        <div class="table-container"><!--Θέτουμε ένα container div για το table μας -->
            <h2>Courses</h2>
            <form method="POST" action="generate_report.php"> <!--Στέλνουμε ένα POST request στο generate_report.php μόλις γίνει το Submit  (W3Schools, 2024)-->
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1"></th> <!--table header κελί με το οποίο θέτουμε το checkbox για όλα τα courses. (Docs, 2024) -->
                            <th>Action</th>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Level</th>
                            <th>Duration</th>
                            <th>Overview</th>
                            <th>Highlights</th>
                            <th>Course Details</th>
                            <th>Modules</th>
                            <th>Entry Requirements</th>
                            <th>Fees (GBP)</th>
                            <th>Fees (EUR)</th>
                            <th>Fees (USD)</th>
                            <th>FAQs</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody id="course-table-body"> <!--Το table body όπου θα εισαχθούν όλα τα data από τα courses. Το id χρησιμοποιείται για data manipulation σε συνδυασμό με JavaScript (Docs, 2024)-->
                        <?php include 'display_courses.php'; ?> <!--Το display courses το κάνουμε include ώστε να πάρουμε και να δείξουμε τα αντίστοιχα data των courses από την Database-->
                    </tbody>
                </table>
                <button type="submit" class="button">Generate Report</button> <!--Προσθήκη button για να κάνουμε submit την φόρμα και παράλληλα να γίνει generate το report μας.-->
            </form>
        </div>
    </div>
</body>
</html>
