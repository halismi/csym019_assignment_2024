<!DOCTYPE html> <!-- H έκδοση της HTML που χρησιμοποιείται, η οποία στην προκειμένη περίπτωση είναι η HTML5 (W3Schools, 2024)--> 
<html lang="en"> <!-- Ξεκινάει το HTML document και καθορίζει την γλώσσα -->
<head>
    <meta charset="UTF-8"> <!-- Θέτει το character encoding για το document ώστε να είναι συμβατή σε διάφορες γλώσσες/συσκευές (Docs, 2024)-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Θέτουμε το viewport width και το width της συσκευής -οι ρυθμίσεις αυτές συνήθως ορίζουν μεταξύ άλλων και κατά πόσο η σελίδα μας θα είναι συμβατή με άλλες συσκευές -->

    <title>University of Northampton Courses</title> <!-- Τίτλος σελίδας-->
    <link rel="stylesheet" href="style.css" type="text/css"/> <!--  Ορίζουμε εξωτερικό αρχείο CSS (συγκεκριμένα το style.css) για το styling της σελίδας μας. -->
</head>
<body>
    <header>
        <h1>University of Northampton Courses</h1>
    </header>

    <div class="container"><!-- Για την δομή του main θα θέσουμε ένα div class τύπου container. --> 
        <div class="form-container"> <!--Προσθήκη φόρμας - container. -->
            <h2>Add New Course</h2> <!--Τίτλος φόρμας -->
            <form method="POST" action="form_handler.php" target="_blank"> <!--Στέλνουμε POST request στο αρχείο form_handler.php μόλις γίνει submit (με το αντίστοιχο button) το οποίο θα ανοίξει σε νέο παράθυρο/tab το response. (W3Schools, 2024)-->
<!--Παρακάτω θέτουμε τα input και textarea elements για την εισαγωγή του course. Το placeholder δίνει ένα hint στο χρήστη για το τι πρέπει να βάλει στο αντίστοιχο πεδίο και τα required fields είναι τα πεδία που πρέπει να συμπληρωθούν υποχρεωτικά (Docs, 2024) -->
                <input type="text" id="course_name" name="course_name" placeholder="Course Name" required>
                <input type="text" id="level" name="level" placeholder="Level" required>
                <input type="text" id="duration" name="duration" placeholder="Duration" required>
                <textarea id="overview" name="overview" placeholder="Overview" required></textarea>
                <textarea id="highlights" name="highlights" placeholder="Highlights" required></textarea>
                <textarea id="course_details" name="course_details" placeholder="Course Details" required></textarea>
<!--Παρακάτω θέτουμε ειδικό πεδίο για τα Modules σε περίπτωση που ο χρήστης θέλει να βάλει παραπάνω από ένα Module/Credits. Το name=modules[] και credits[] υποδηλώνει οτί τα στοιχεία αυτά θα αποθηκευτούν στον αντίστοιχο πίνακα. Χρησιμοποιούμε 5 ενδεικτικά. -->
                <h3>Modules</h3>
                <div>
                    <input type="text" name="modules[]" placeholder="Module Name 1" required>
                    <input type="number" name="credits[]" placeholder="Credits 1" required>
                </div>
                <div>
                    <input type="text" name="modules[]" placeholder="Module Name 2" required>
                    <input type="number" name="credits[]" placeholder="Credits 2" required>
                </div>
                <div>
                    <input type="text" name="modules[]" placeholder="Module Name 3" required>
                    <input type="number" name="credits[]" placeholder="Credits 3" required>
                </div>
                <div>
                    <input type="text" name="modules[]" placeholder="Module Name 4" required>
                    <input type="number" name="credits[]" placeholder="Credits 4" required>
                </div>
                <div>
                    <input type="text" name="modules[]" placeholder="Module Name 5" required>
                    <input type="number" name="credits[]" placeholder="Credits 5" required>
                </div>

                <textarea id="entry_requirements" name="entry_requirements" placeholder="Entry Requirements" required></textarea>
                <input type="number" step="0.01" id="fees_and_funding_GBP" name="fees_and_funding_GBP" placeholder="Fees (GBP)" required>
                <input type="number" step="0.01" id="fees_and_funding_EUR" name="fees_and_funding_EUR" placeholder="Fees (EUR)" required>
                <input type="number" step="0.01" id="fees_and_funding_USD" name="fees_and_funding_USD" placeholder="Fees (USD)" required>
                <textarea id="faqs" name="faqs" placeholder="FAQs" required></textarea>
                <input type="text" id="image_url" name="image_url" placeholder="Image URL" required>
                <button type="submit">Add Course</button> <!--Submit της φόρμας-->
            </form>
        </div>

        <div class="link-container"> <!--Container div για το link των courses-->
            <h2>Manage Courses</h2>
            <a href="courses.php" target="_blank" class="button">View and Manage Courses</a> <!--Σύνδεσμος για το courses.php το οποίο θα ανοίξει σε νέο παράθυρο/tab (Docs, 2024)-->
        </div>
    </div>
</body>
</html>
