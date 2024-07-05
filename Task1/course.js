// Function to load courses from server using XMLHttpRequest
    function loadCourses() {
        var req = new XMLHttpRequest();
        // Open a GET request to fetch course.json
        req.open('GET', 'course.json', true);
        req.onreadystatechange = function() {
            if (req.readyState === 4 && req.status === 200) {
                //Parse the JSON response
                var data = JSON.parse(req.responseText);
                var courses = data.courses;
                var tableBody = document.getElementById('course-table-body');
                
                // Clear any previous data
                tableBody.innerHTML = '';

                // Populate table with course data
                courses.forEach(course => {
                    var row = document.createElement('tr');
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
                    tableBody.appendChild(row);
                });

// Set timeout to reload the courses after 5 minutes
        setTimeout(loadCourses, 5 * 60 * 1000); // Reload the courses after 5 minutes
            }
        };
        req.send();
    }

    // Initial load
    loadCourses();

