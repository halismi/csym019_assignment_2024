
    function loadCourses() {// Καθορίζουμε την function loadCourses η οποία αντλεί τα δεδομένα των courses από τον server
        var req = new XMLHttpRequest();//Δημιουργούμε ένα  XMLHttpRequest, το οποίο θα χρειαστεί για να ανταλλάξουμε data με τον server.
       
        req.open('GET', 'course.json', true);// Ξεκινάμε το GET request για να αντλήσουμε τα data από το course.json αρχείο. Η παράμετρος true υποδηλώνει ότι το request είναι ασύγχρονο
        req.onreadystatechange = function() {//Δημιουργία function για την διαχείριση του state του request 
            if (req.readyState === 4 && req.status === 200) {//Έλεγχος εάν το request ολοκληρώθηκε επιτυχώς και υπάρχει έτοιμη απάντηση 
                
                var data = JSON.parse(req.responseText);//Γίνεται parse η απάντηση του JSON σε ένα JavaScript Object 
                var courses = data.courses;//Εξάγουμε τον πίνακα courses από τα parsed data και τον χρησιμοποιούμε σε μια ομώνυμη μεταβλητή
                var tableBody = document.getElementById('course-table-body');//Λαμβάνουμε το table-body στοιχείο στο οποίο θα τοποθετήσουμε όλες τις γραμμές των courses και τον χρησιμοποιούμε σε μια μεταβλητή tableBody
                
               
                tableBody.innerHTML = '';// Όλο το innerHTML του tableBody γίνεται clear πριν γραφτούν οποιαδήποτε άλλα δεδομένα 

                               // Προσθέτουμε στον πίνακα τα data των courses
                courses.forEach(course => { //Για κάθε μάθημα του πίνακα courses δημιουργούμε μια γραμμή 
                    var row = document.createElement('tr');//Δημιουργία tr element χρησιμοποιώντας την document.createElement() μέθοδο 
                    row.innerHTML = `
                        <td>${course.id}</td>
                        <td>${course.course_name}</td>
                        <td>${course.level}</td>
                        <td>${course.duration}</td>
                        <td>${course.overview}</td>
                        <td>${course.highlights}</td>
                        <td>${course.course_details}</td>
                        <td>${course.entry_requirements}</td>
                        <td>£${course.fees_and_funding.GBP}</td>
                        <td>€${course.fees_and_funding.EUR}</td>
                        <td>$${course.fees_and_funding.USD}</td>
                        <td>${course.funding_available ? 'Yes' : 'No'}</td>
                        <td>${course.accreditation}</td>
                        <td>${course.student_perks}</td>
                        <td>${course.faqs}</td>
                        <td><img src="${course.image_url}" class="course-image"></td>
                        
                     `;
                    tableBody.appendChild(row);//Προσθέτουμε τη νέα γραμμή που δημιουργήθηκε στον πίνακα
                });


        setTimeout(loadCourses, 5 * 60 * 1000); // Θέτουμε ένα timeout για να φορτωθεί εκ νέου η loadCourses κάθε 300,000 milliseconds (5 λεπτά
            }
        };
        req.send();
    }

    
    loadCourses();//Καλούμε την loadCourses για να αντληθούν/εμφανιστούν τα αρχικά δεδομένα του courses.

